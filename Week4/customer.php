<?php
/**
 * Created by PhpStorm.
 * User: KT
 * Date: 2/18/2015
 * Time: 11:14 AM
 */
/**
 * Class Customer
 *
 */
class Customer {
    public $custid;
    public $fname;
    public $lname;
    public $street;
    public $city;
    public $state;
    public $zip;

    // Construct the customer attributes

    /**
     * @param $custid
     * @param $fname
     * @param $lname
     * @param $street
     * @param $city
     * @param $state
     * @param $zip
     */
    public function __construct($custid,$fname,$lname,$street,$city,$state,$zip){
        $this->custid = $custid;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->street = $street;
        $this->city = $city;
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function putCustId(){
        return $this->custid;
    }
}