<?php

namespace Xshare\ProductBundle;
use Xshare\SecurityBundle\Entity\Product;

class ProductGeneral 
{
    static public function getAvailableInXDays($products)
    {
        
        $products_availability = array();
        $em = XshareProductBundle::getContainer()->get('doctrine')->getEntityManager('default');
        
        foreach ($products as $key => $product) {
            $pid = $product['product_id'];
            $products_availability[$pid] = 0;
            if ($product['status'] == 0) {
                $loans = $em->getRepository('XshareProductBundle:Booking')->getAcceptedLoansForProduct($pid);
                $c_loans = count($loans); //the number of accepted loans
                if ($c_loans) {
                    $today = time();
                    if ($c_loans == 1) { //if the product has only one loan we take the difference between today and the return date
                        //return date
                        list($ry, $rm, $rd) = explode("-", $loans[0]['return_date']);
                        $return_time = mktime(0, 0, 0, $rm, $rd, $ry);
                        $products_availability[$pid] = ceil(($return_time - $today) / (60*60*24)) + 1;
                    } else { //if the product has more loans
                        for($i = 1; $i < $c_loans; $i++) {
                            list($by, $bm, $bd) = explode("-", $loans[$i]['borrow_date']);
                            $borrow_time = mktime(0, 0, 0, $bm, $bd, $by);
                            list($ry, $rm, $rd) = explode("-", $loans[$i-1]['return_date']);
                            $return_time = mktime(0, 0, 0, $rm, $rd, $ry);
                            //check if the interval between loans is more than one day
                            //in this case return the difference between today and the first loan return date
                            if (ceil(($borrow_time - $return_time) / (60*60*24)) > 1) {
                                $products_availability[$pid] = ceil(($return_time - $today) / (60*60*24)) + 1;
                                break;
                            } else { //in othe case return the difference between today and last return date
                                if ($i == ($c_loans - 1)) { //if the last loan has bean reached
                                    list($ry, $rm, $rd) = explode("-", $loans[$i]['return_date']);
                                    $return_time = mktime(0, 0, 0, $rm, $rd, $ry);
                                    $products_availability[$pid] =(int) ceil(($return_time - $today) / (60*60*24)) + 1;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $products_availability;
        
    }
    
    public function cutLongText($text, $numberOfChars = 100 , $afterText = "...")
    {
        $charNr = mb_strlen($text, 'utf8');
        if($charNr>$numberOfChars){
            return mb_substr($text, 0, $numberOfChars, "utf8").$afterText;
        }else{
            return $text;
        }
    }
}
