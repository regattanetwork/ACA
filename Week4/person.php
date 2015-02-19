<?php
/**
 * Created by PhpStorm.
 * User: KT
 * Date: 2/18/2015
 * Time: 11:14 AM
 */
/**
 * Class Person
 *
 */
class Person {
    protected $custid;
    protected $name;
    protected $address;


    // Construct the attributes of the person class

    /**
     * @param int $custid
     * @param string $name
     * @param string $address

     */
    public function __construct($custid,$name,$address){
        $this->custid = $custid;
        $this->name = $name;
        $this->address = $address;

    }

    /**
     * This probably needs to have and auto increment based on the DB record if/when we get to that point.  
     * @return mixed
     */
    public function getCustId(){
        return $this->custid;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     * Should be expanded to street, city, state, zip or billing address(ie - Bstreet,Bcity,Bzip)
     * and shipping address ( ie - Sstreet,Scity,Szip)
     */
    public function getAddress(){
        return $this->address;
    }

    class Customer extends Person{

    protected $orderHist = array();

    public function addOrder($Orderid){}
}
}