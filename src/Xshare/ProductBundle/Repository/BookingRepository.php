<?php

namespace Xshare\ProductBundle\Repository;

use Doctrine\ORM\EntityRepository;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;

/**
 * Description of BookingRepository
 *
 * @author spasat
 */
class BookingRepository extends EntityRepository{
    /**
     * verify if given period is not in booking table
     * @param type int $pid  - id of the product
     * @param type string $date1 - period from 
     * @param type string $date2 - period to 
     */
    public function checkIfValidPeriod($pid, $date1, $date2) {

        $q = $this->getEntityManager()->createQuery(
            "SELECT COUNT(b.booking_id) AS lnr FROM XshareProductBundle:Booking b 
                WHERE 
                    b.product_id = :pid 
                   AND (
                        (b.borrow_date > :d1 AND b.borrow_date < :d2) 
                         OR 
                        (b.return_date > :d1 AND b.return_date < :d2) 
                         OR
                         b.borrow_date = :d1  
                         OR
                         b.return_date = :d2
                    )")
                ->setParameters(array(
                'pid'=>$pid,
                'd1'=>$date1,
                'd2'=>$date2
             ))
        ;
        try {
            $result = $q->getSingleScalarResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $result = 0;
        }
        
        return $result;
    }
    
    /**
     * get product list of bookings(accepted requests)
     * @param type integer $pid 
     * @return type array list of product bookings
     */
    public function getBookingByProduct($pid){
        $q = $this->createQueryBuilder("b")
                  ->where("b.product_id= :pid")
                  ->setParameter("pid", $pid)
                  ->getQuery();
       return $q->getArrayResult(); 
    }


    /**
     * @author vmoroi
     * returns the loan periods that have been accepted for the product
     * @param type $pid product id
     */
    
    public function getAcceptedLoansForProduct($pid) {
        $query = $this->createQueryBuilder("b")
                ->where("b.product_id= :pid")
                ->setParameter("pid",$pid)
                ->orderBy("b.borowed_date","DESC")
                ->getQuery();
        
        
        return $query->getArrayResult();
    }
    
    /**
     * @author s.pasat
     * delete booking by id
     * @param type $bid booking id
     * 
     */
    function deleteBooking($bid){
       $this->createQueryBuilder("b")
            ->where("booking_id= :bid")
            ->setParameter("bid", $bid)
            ->delete();   
    }
}