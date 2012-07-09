<?php

namespace Xshare\ProductBundle\Repository;

use Doctrine\ORM\EntityRepository;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;
use MakerLabs\PagerBundle\Adapter\ArrayAdapter;

/**
 * Description of RequestsRepository
 *
 * @author spasat
 */
class RequestsRepository extends EntityRepository{
    /**
     * gets loans for a product since a given date
     *
     * @param int $pid  - id of the product
     * @param string $date - taking loans from this date since now
     */
    public function getRequestsByProductSinceDate($pid, $date) {
        $qb = $this->createQueryBuilder('r')
            ->select('count(r.request_id)')
            ->leftJoin('r.product', 'p')
            ->where('p.product_id = :pid')
            ->setParameter('pid', $pid)
            ->andWhere('r.borrow_date >= :date')
            ->setParameter('date', $date)
            ->andWhere("r.real_return_date IS NOT NULL OR r.booking_id IS NOT NULL");
        

        $query = $qb->getQuery();

        try {
            $result = $query->getSingleScalarResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $result = 0;
        }
        
        return $result;
    }
    
    /**
     * @author spasat
     * gets accepted loans for a product
     * @param type int $pid  - id of the product
     * @param int $pid  - id of the product
     * @return type
     */
    public function getRequestsByProduct($pid) {

        $qb = $this->createQueryBuilder('r')
                ->select("r.borrow_date, r.return_date")
                ->leftJoin('l.product', 'p')
                ->where('p.product_id = :pid')
                ->setParameter('pid', $pid)
                ->andWhere('r.booking_id is NULL');
        $query = $qb->getQuery();

        return $query->getArrayResult();
    }
    
    /**
     * loads loan requests made for a product
     *
     * @param int $product_id
     * @param string $criteria
     * @param string $order
     * @return \MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter
     */
    public function loadUsersByProductRequests($product_id, $criteria = 'date', $order = 'DESC') {

        $qb = $this->createQueryBuilder('r');

        if ($criteria == 'title')
            $qb->leftJoin('r.user', 'u');
        
        $qb->leftJoin('r.booking', 'b');

        $qb->where('r.product = :product_id')
            ->setParameter('product_id', $product_id)
            ->andWhere('r.booking is null');

        switch ($criteria) {
            case 'date':
                $qb->orderBy('r.borrow_date', $order);
                break;
            case 'title':
                $qb->orderBy('u.username', $order);
                break;
        }
       
       return new DoctrineORMAdapter($qb);
    }
    
    /**
     * a list of intersected by date loans
     *
     * @param int $product_id
     * @param int $loan_id
     * @param string $borrow_date
     * @param string $return_date
     * @return array
     */
    public function getIntersectedByDateRequests($product_id, $loan_id, $borrow_date, $return_date) {

        $query = $this->getEntityManager()->createQuery(
            "SELECT r FROM XshareProductBundle:Requests r
             WHERE
                    r.request_id != :loan_id
                AND
                    r.product = :product_id
                AND 
                    r.booking_id IS NULL    
                AND (
                        (r.borrow_date < :brd AND r.return_date > :rtd)
                    OR
                        (r.return_date > :brd AND r.borrow_date < :brd)
                    OR
                        (r.borrow_date < :rtd AND r.return_date > :rtd)
                    OR
                        r.borrow_date = :brd 
                    OR 
                        r.return_date = :rtd
                    )")
                ->setParameter('loan_id',    $loan_id)
                ->setParameter('product_id', $product_id)
                ->setParameter('brd',        $borrow_date)
                ->setParameter('rtd',        $return_date);
        
        return $query->getResult();
    }
    
    /**
     * @author cchiu
     * get requests for one product by product_id
     * 
     * @param int $product_id
     * @param int $order
     * @return \MakerLabs\PagerBundle\Adapter\ArrayAdapter 
     */
    public function getRequestsByProductId($product_id, $order = 0)
    {
        $qb = $this->getEntityManager()
                   ->createQueryBuilder()
                   ->select('r.request_id, r.borrow_date, r.return_date, u.user_id, u.firstname, u.lastname')
                   ->from('XshareProductBundle:Requests', 'r')
                   ->leftJoin('r.user', 'u')
                   ->where('r.product = :product_id')
                   ->setParameter('product_id', $product_id)
                   ->andWhere('r.booking is null');   
        
        switch ($order) {
            case 0: {
                    $qb = $qb->addOrderBy('r.borrow_date', 'desc');
                    break;
                }
            case 1: {
                    $qb = $qb->addOrderBy('r.borrow_date', 'asc');
                    break;
                }
        }        
        
        $res = $qb->getQuery()->getArrayResult();
        
        return new ArrayAdapter($res);
        
    }
    
    /**
     * get user requests for "My Requests" page and right block "My Last Requests"
     * @author s.pasat
     * @param type $uid
     * @param type $orderby
     * @param type $limit
     * @return \Xshare\ProductBundle\Repository\DoctrineORMAdapter OR querybuilder results
     */
    
    function getUserRequests($uid, $orderby = 0, $limit = null ){
        $qb = $this->createQueryBuilder('r')
                   ->where("r.user_id = :uid")
                   ->setParameter("uid", $uid);
      if(!isset($limit)){
            $qb->orderBy("r.product_id");
                   
        if($orderby==1)
            $qb->addOrderBy("r.borrow_date","DESC");
        else
            $qb->addOrderBy("r.borrow_date","ASC");
        
       return new DoctrineORMAdapter($qb);
      }else{
          $qb->andWhere("r.real_return_date is null");
          $qb->orderBy('r.created_at',"DESC");
          $qb->setMaxResults($limit);
          return $qb->getQuery()->getResult();
      }
    }
    
}
