<?php

namespace Xshare\ProductBundle\Repository;

use Doctrine\ORM\EntityRepository;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;
use MakerLabs\PagerBundle\Adapter\ArrayAdapter;
use Doctrine\ORM\Query\Expr;

/**
 * CategoryRepository
 */
class CategoryRepository extends EntityRepository {

    /**
     * a list of categories beloging to a given user id
     * @param int $user_id
     * @return \MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter
     */
    public function getUserCategories($user_id) {

        $qb = $this->createQueryBuilder('c')
            ->where('c.user = :user_id')
            ->setParameter('user_id', $user_id)
            ->orderBy('c.created_at', 'DESC');

        return new DoctrineOrmAdapter($qb);
    }

    /**
     * quantity of catefories beloging to a given user id
     * @param int $user_id
     * @return int
     */
    public function countUserCategories($user_id) {
        $qb = $this->createQueryBuilder('c')
            ->select('count(c.category_id)')
            ->where('c.user = :user_id')
            ->setParameter('user_id', $user_id);

        $query = $qb->getQuery();

        return $query->getSingleScalarResult();
    }

    /**
     * list of categories for paginator
     * @return \MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter
     */
    public function getAllPaginateCategories() {

        $qb = $this->createQueryBuilder('c');

        return new DoctrineOrmAdapter($qb);
    }

    /**
     * getting the list of categories
     * @param int $status
     * @return array
     */
    public function getAllCagetories($status = null, $sort = 'name', $order = 'ASC') {

        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder()
                ->select('c.category_id, c.name, c.created_at, count(b.product_id) as units')
                ->from('XshareProductBundle:Category', 'c')
                ->leftJoin('c.products', 'b')
                ->groupBy('c.category_id');

        if (isset($status))
            $qb->where('c.status = :status')
                    ->setParameter('status', $status);

        if (isset($sort))
            $qb->orderBy('c.' . $sort, $order);

        return $qb->getQuery()->getArrayResult();
    }

    /**
     * @author cchiu
     * all categories from the database
     * @param DataTime $date
     * @param string $title
     * @param string $unities
     * @return \MakerLabs\PagerBundle\Adapter\ArrayAdapter
     */
    public function getCategoryList($date = null, $title = null, $unities = null) {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder()
                ->select('c.category_id, c.name, c.created_at, u.user_id, u.sex, count(b.product_id) as units')
                ->from('XshareProductBundle:Category', 'c')
                ->where('c.status = :status')
                ->setParameter('status', '1')
                ->leftJoin('c.products', 'b')
                ->join('c.user', 'u')
                ->groupBy('c.category_id');

        if ($date != null) {
            $qb->orderBy('c.created_at', $date);
        } else {
            $date = 'desc';
            $qb->orderBy('c.created_at', $date);
        }

        if ($title != null) {
            $qb->orderBy('c.name', $title);
        }

        if ($unities != null) {
            $qb->orderBy('units', $unities);
        }

        $res = $qb->getQuery()->getArrayResult();

        $adapter = new ArrayAdapter($res);

        return $adapter;
    }

    /**
     * a list of sorted categories by several criterias
     * @param int $user_id
     * @param string $criteria
     * @param string $order
     * @return \MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter
     */
    public function getSortedCategories($user_id, $criteria, $order) {
        $qb = $this->createQueryBuilder('c')
                ->where('c.user = :user_id')
                ->setParameter('user_id', $user_id);

        switch ($criteria) {
            case 'date';
                $qb->orderBy('c.created_at', $order);
                break;
            case 'title';
                $qb->orderBy('c.name', $order);
                break;
        }

        return new DoctrineOrmAdapter($qb);
    }

    /**
     * a list of sorted by products qty categories
     * @param int $user_id
     * @param string $order
     * @return \MakerLabs\PagerBundle\Adapter\ArrayAdapter
     */
    public function getSortedByNbProdsCategories($user_id, $order) {

        $qb = $this->getEntityManager()->createQuery(
            "SELECT c, COUNT(p.product_id) AS pcount, u
             FROM XshareProductBundle:Category c LEFT JOIN c.products p LEFT JOIN c.user u
                WHERE c.user = :user_id
                GROUP BY c.category_id
                ORDER BY pcount " . $order
            )
            ->setParameter('user_id', $user_id);

        $res = $qb->getArrayResult();

        return new ArrayAdapter($res);
    }
    
    
    /**
     * @author cchiu
     * get the list of top categories
     * 
     * @param int $limit - this limit is used for top 3 categories
     * @param string $date - for sorting by created-at date
     * @param string $title - for sorting by name
     * @param string $unities - for sorting by number of products
     * 
     * @return \MakerLabs\PagerBundle\Adapter\ArrayAdapter 
     */
    public function getTopCategories($limit = null, $date = null, $title = null, $unities = null)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder()
                ->select('c.category_id, c.name, c.created_at, c.image, u.user_id, u.sex, count(b.product_id) as units')
                ->from('XshareProductBundle:Category', 'c')
                ->where('c.status = :status')
                ->setParameter('status', '1')
                ->leftJoin('c.products', 'b')
                ->leftJoin('c.user', 'u')
                ->groupBy('c.category_id');
        
        if ($unities != null) {
            $qb->orderBy('units', $unities);
        } else {
            $unities = 'desc';
            $qb->orderBy('units', $unities);     
        }    

        if($limit != null){
            $qb->setMaxResults($limit);
        }
        
        if ($date != null) {
            $qb->orderBy('c.created_at', $date);
        } 

        if ($title != null) {
            $qb->orderBy('c.name', $title);
        }
                
        $res = $qb->getQuery()->getArrayResult();

        $adapter = new ArrayAdapter($res);
  
        return $adapter;
    }
    
    /**
     * @author s.pasat
     * @param type $pid 
     * increment statistics colomn
     */
    public function addViewer($cid){
        $this->createQueryBuilder("c")
             ->update()
             ->set('c.statistics', 'c.statistics+1')
             ->where("c.category_id=:cid")   
             ->setParameter("cid", $cid)    
             ->getQuery()
             ->execute();   
    }
    
}