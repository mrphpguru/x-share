<?php

namespace Xshare\ProductBundle\Repository;

use Doctrine\ORM\EntityRepository;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;
use MakerLabs\PagerBundle\Adapter\ArrayAdapter;

/**
 * ProductRepository
 */
class ProductRepository extends EntityRepository {

    /**
     * list of user products
     *
     * @param int $user_id
     * @param string $orderby
     * @param string $from
     * @param boolean $isMyProducts
     * @return \MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter
     */
    public function getUserProducts($user_id, $orderby = 0, $from = null , $isMyProducts = false) {

        $qb = $this->createQueryBuilder('p')
                   ->where('p.user = :user_id')
                   ->setParameter('user_id', $user_id);


            if(!$isMyProducts ){
                $qb = $qb->andWhere('p.enable = 1');
            }
        
        switch ($orderby) {

            case 0: {
                    $qb = $qb->addOrderBy('p.created_at');
                    break;
                }
            case 11: {
                    $qb = $qb->addOrderBy('p.created_at');
                    break;
                }
            case 12: {
                    $qb = $qb->addOrderBy('p.created_at', 'desc');
                    break;
                }
            case 21: {
                    $qb = $qb->addOrderBy('p.name');
                    break;
                }
            case 22: {
                    $qb = $qb->addOrderBy('p.name', 'desc');
                    break;
                }
            case 31: {
                    $qb = $qb->leftJoin('p.category', 'c');
                    $qb = $qb->addOrderBy('c.name');
                    break;
                }
            case 32: {
                    $qb = $qb->leftJoin('p.category', 'c');
                    $qb = $qb->addOrderBy('c.name', 'desc');
                    break;
                }
        }

        return new DoctrineOrmAdapter($qb);
    }

    /**
     * list of category products, sorted by created date (desc)
     *
     * @param int $category_id
     * @param int $limit
     * @return array
     */
    public function getCategoryProducts($category_id, $limit) {
        $query = "SELECT p.product_id, p.name, p.created_at, p.image, p.status, u.username, u.user_id, c.name as category_name, c.category_id, r.return_date,
                            (SELECT COUNT(r1.request_id) 
                             FROM XshareProductBundle:Requests r1 
                             WHERE 
                                r1.product_id = p.product_id
                             AND 
                                (r1.booking_id IS NOT NULL
                                 OR 
                                 r1.real_return_date IS NOT NULL)
                             ) as loans
                  FROM XshareProductBundle:Product p
                  LEFT JOIN p.requests r
                  LEFT JOIN p.category c
                  LEFT JOIN p.user u
                  WHERE p.enable = 1
                  AND c.category_id = :category_id
                  GROUP BY p.product_id
                  ORDER BY p.created_at DESC";
        $results = $this->getEntityManager()
                        ->createQuery($query)
                        ->setParameter("category_id",$category_id)
                        ->setMaxResults($limit)
                        ->getArrayResult();
        return new ArrayAdapter($results);
    }

    /**
     * a list of category products limited by a period of time
     *
     * @param int $category_id
     * @param string $date
     * @return int
     */
    public function getCategoryProdsSinceDate($category_id, $date) {

        $qb = $this->createQueryBuilder('p')
            ->select('count(p.product_id)')
            ->leftJoin('p.requests', 'r')
            ->where('p.category = :category_id')
            ->setParameter('category_id', $category_id)
            ->andWhere('r.borrow_date >= :date')
            ->setParameter('date', $date)
            ->andWhere('r.booking_id is not null OR r.real_return_date is not null')
            ->andWhere('p.enable = 1');

        return $qb->getQuery()->getSingleScalarResult();
    }

    /**
     *
     * get product by id
     * @author spasat
     * @param int pid
     * @return int
     */

    public function getProductById($pid) {

        $query = $this->createQueryBuilder('p')
                ->where('p.product_id = :pid')
                ->setParameter('pid', $pid)
                ->getQuery();

        // try if result exists
        try {
            $r = $query->getSingleResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $r = null;
        }
        return $r;
    }

    /**
     * delete product by id functinality
     * @param int $pid
     * @return void
     */
    public function deleteProductById($pid) {

        $query = $this->createQueryBuilder('p')
            ->delete()
            ->where('p.product_id = :pid')
            ->setParameter('pid', $pid);

        $query->getQuery()->execute();
    }

    /**
     * a list of products for given category id
     * with optional product status param
     * returns object suitable for paginator
     *
     * @author idercaci
     * @param int $cid
     * @param int $status
     * @return DoctrineOrmAdapter
     */
    public function getProductsByCategory($cid, $status = null) {

        /*$qb = $this->getEntityManager()
                ->createQueryBuilder()
                ->select(
                        'p.name, p.product_id, p.description, p.image, p.status, p.created_at,
                        u.username, u.user_id,
                        c.name AS category_name,
                        
                        '
                )
                ->from('XshareProductBundle:Product', 'p')
                ->leftJoin('p.user', 'u')
                ->leftJoin('p.category', 'c')
                ->where('p.category = :id')
                ->setParameter('id', $cid);

        if (isset($status))
            $qb->andWhere('p.status = :status')
                ->setParameter('status', (int) $status);
        $qb->andWhere('p.enable = 1');
        
        $res = $qb->getQuery()->getArrayResult();   

        return new ArrayAdapter($res);*/
        $stringStatus = "";
        if (isset($status)){
            $s = (int)$status;
            $stringStatus = " AND p.status = {$s} ";
        }
        $query = "SELECT p.product_id, p.name, p.created_at, p.image, p.status, u.username, u.user_id, c.name as category_name, c.category_id, r.return_date,
                            (SELECT COUNT(r1.request_id) 
                             FROM XshareProductBundle:Requests r1 
                             WHERE 
                                r1.product_id = p.product_id
                             AND 
                                (r1.booking_id IS NOT NULL
                                 OR 
                                 r1.real_return_date IS NOT NULL)
                             ) as loans 
                  FROM XshareProductBundle:Product p
                  LEFT JOIN p.requests r
                  LEFT JOIN p.category c
                  LEFT JOIN p.user u
                  WHERE p.enable = 1
                  ".$stringStatus."
                  GROUP BY p.product_id";
        
        $results = $this->getEntityManager()->createQuery($query)->getArrayResult();
        return new ArrayAdapter($results);
        
    }

    /**
     * user_details page data
     *
     * @param int $user_id
     * @param string $orderby
     * @return \MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter
     */
    public function getUserAvailableProducts($user_id, $orderby = 0) {

        $qb = $this->createQueryBuilder('p')
                ->where('p.user = :user_id')
                ->andWhere('p.status = :status')
                ->setParameter('user_id', $user_id)
                ->setParameter('status', '1');

        switch ($orderby) {
            case 0: {
                    break;
                }
            case 11: {
                    $qb = $qb->addOrderBy('p.created_at');
                    break;
                }
            case 12: {
                    $qb = $qb->addOrderBy('p.created_at', 'desc');
                    break;
                }
            case 21: {
                    $qb = $qb->addOrderBy('p.name');
                    break;
                }
            case 22: {
                    $qb = $qb->addOrderBy('p.name', 'desc');
                    break;
                }
            case 31: {
                    $qb = $qb->leftJoin('p.category', 'c');
                    $qb = $qb->addOrderBy('c.category_id');
                    break;
                }
            case 32: {
                    $qb = $qb->leftJoin('p.category', 'c');
                    $qb = $qb->addOrderBy('c.category_id', 'desc');
                    break;
                }
        }

        return new DoctrineOrmAdapter($qb);
    }
    
    /**
     * get the number of products lent by the user
     *
     * @author cchiu
     * @param int $user_id
     * @return int 
     */
    public function getLentProductsByUserId($user_id) {
        
        $qb = $this->createQueryBuilder('p')
            ->select('count(p.product_id)')
            ->innerJoin('p.requests', 'r')
            ->leftJoin('p.user', 'u')
            ->where('p.user = :user_id')
            ->andWhere('r.booking_id is not null')
            ->andWhere('r.real_return_date is null')    
            ->setParameter('user_id', $user_id);
        
        return $qb->getQuery()->getSingleScalarResult();
        
    }
    
    /**
     * @author vmoroi
     * returns the top products list
     * @param type $filter - the sorting criteria
     * @param type $order - the sorting order
     * @return \MakerLabs\PagerBundle\Adapter\ArrayAdapter 
     */
    public function getMostLoanedProducts(/*$filter, $order*/){
        $query = "SELECT p.product_id, p.name, p.created_at, p.image, p.status, u.username, u.user_id, c.name as category_name, c.category_id, r.return_date,
                            (SELECT COUNT(r1.request_id) 
                             FROM XshareProductBundle:Requests r1 
                             WHERE 
                                r1.product_id = p.product_id
                             AND 
                                (r1.booking_id IS NOT NULL
                                 OR 
                                 r1.real_return_date IS NOT NULL)
                             ) as loans 
                  FROM XshareProductBundle:Product p
                  LEFT JOIN p.requests r
                  LEFT JOIN p.category c
                  LEFT JOIN p.user u
                  WHERE p.enable = 1
                  GROUP BY p.product_id
                  ORDER BY loans DESC";
        
        $results = $this->getEntityManager()->createQuery($query)->getArrayResult();
        return new ArrayAdapter($results);
    }
    /**
     *
     * @param type int $filter 
     * 
     * orded by
     * 0---by Date asc
     * 1---by Date desc
     * 21--by Name asc
     * 22--by Name desc
     * 31--by Category name asc
     * 32--by Category name desc
     * 41--by User username asc
     * 42--by User username desc
     * 51--by Status asc
     * 52--by Status desc
     * @return \MakerLabs\PagerBundle\Adapter\ArrayAdapter 
     */
    
    public function getAllProductsList($orderBy = 0)
    {
        $qb = $this->createQueryBuilder('p')
                   ->select("p","c","u")
                   ->leftJoin('p.category', 'c')
                   ->leftJoin('p.user', 'u');
        
        switch ($orderBy) {
            case 0: {
                    $qb = $qb->addOrderBy('p.created_at');
                    break;
                }
            case 1: {
                    $qb = $qb->addOrderBy('p.created_at', 'desc');
                    break;
                }
            case 21: {
                    $qb = $qb->addOrderBy('p.name');
                    break;
                }
            case 22: {
                    $qb = $qb->addOrderBy('p.name', 'desc');
                    break;
                }
            case 31: {
                    $qb = $qb->addOrderBy('c.category_id');
                    break;
                }
            case 32: {
                    $qb = $qb->addOrderBy('c.category_id', 'desc');
                    break;
                }
            case 41: {
                    $qb = $qb->orderBy('u.username');
                    break;
                }
            case 42: {
                    $qb = $qb->addOrderBy('u.username', 'desc');
                    break;
                }
            case 51: {
                    $qb = $qb->orderBy('p.status');
                    break;
                }
            case 52: {
                    $qb = $qb->addOrderBy('p.status', 'desc');
                    break;
                }    
        }
        
        $qb = $qb->andWhere('p.enable = 1');
        $res = $qb->getQuery()->getArrayResult();

        return new ArrayAdapter($res);
    }
    
    /**
     * @author cchiu
     * get the list of 6 top products
     * 
     * @return \MakerLabs\PagerBundle\Adapter\ArrayAdapter 
     */
    public function getTopSixProducts(){
        $query = "SELECT p.product_id, p.name, p.created_at, p.image, p.status, u.username, u.user_id, c.name as category_name, c.category_id, r.return_date,
                            (SELECT COUNT(r1.request_id) 
                             FROM XshareProductBundle:Requests r1 
                             WHERE 
                                r1.product_id = p.product_id
                             AND 
                                (r1.booking_id IS NOT NULL
                                 OR 
                                 r1.real_return_date IS NOT NULL)
                             ) as loans 
                  FROM XshareProductBundle:Product p
                  LEFT JOIN p.requests r
                  LEFT JOIN p.category c
                  LEFT JOIN p.user u
                  WHERE p.enable = 1
                  GROUP BY p.product_id
                  ORDER BY loans DESC";
        
        $results = $this->getEntityManager()->createQuery($query)->setMaxResults(6)->getArrayResult();
        return new ArrayAdapter($results);
    }

    /**
     * @author vmoroi
     * @param type $limit 
     */
    public function getRecentProducts($limit) {
        $qb = $this->createQueryBuilder('p')
                ->where('p.enable = :enable')
                ->setParameter('enable', 1)
                ->orderBy('p.created_at', 'DESC')
                ->setMaxResults($limit)
                ->getQuery();
        
        return $qb->getResult();
    }
    /**
     * @author s.pasat
     * @param type $pid 
     * increment statistics colomn
     */
    public function addViewer($pid){
        $this->createQueryBuilder("p")
             ->update()
             ->set('p.statistics', 'p.statistics+1')
             ->where("p.product_id=:pid")   
             ->setParameter("pid", $pid)    
             ->getQuery()
             ->execute();   
    }
    
    /**
     * @author cchiu
     * get the list of all requested products for the user by user_id
     * 
     * @param int $user_id
     * @return \MakerLabs\PagerBundle\Adapter\ArrayAdapter 
     */
    public function getRequestedProducts($user_id)
    {
        $qb = $this->getEntityManager()
                   ->createQueryBuilder()
                   ->select('p.product_id, p.name, c.category_id, c.name as category_name')
                   ->from('XshareProductBundle:Product', 'p')
                   ->leftJoin('p.category', 'c')
                   ->leftJoin('p.requests', 'r')
                   ->where('p.user = :user_id')
                   ->setParameter('user_id', $user_id)
                   ->andWhere('r.product_id = p.product_id')
                   ->andWhere('r.booking is null') 
                   ->groupBy('p.product_id')
                   ->orderBy('p.name', 'asc');    
        
        $res = $qb->getQuery()->getArrayResult();
        
        return new ArrayAdapter($res);
    }
    
    /**
     * @author cchiu
     * get the list of recent requests on user's products
     * 
     * @param type $user_id
     * @param type $limit
     * @return \MakerLabs\PagerBundle\Adapter\ArrayAdapter 
     */
    public function getRecentUsersRequestedProducts($user_id, $limit)
    {
        $qb = $this->getEntityManager()
                   ->createQueryBuilder()
                   ->select('p.product_id, p.name, count(r.request_id) as requests')
                   ->from('XshareProductBundle:Product', 'p')
                   ->leftJoin('p.requests', 'r')
                   ->where('p.user = :user_id')
                   ->setParameter('user_id', $user_id)
                   ->andWhere('r.product_id = p.product_id')
                   ->andWhere('r.booking is null') 
                   ->groupBy('p.product_id')
                   ->orderBy('r.request_id', 'desc')
                   ->setMaxResults($limit);
        
        $res = $qb->getQuery()->getArrayResult();
        
        return new ArrayAdapter($res);
        
    }
}