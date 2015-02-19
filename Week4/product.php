<?php
/**
 * Created by PhpStorm.
 * User: KT
 * Date: 2/18/2015
 * Time: 11:16 AM
 */
/**
 *Define product characteristics
 */
// Product attributes are protected form manipulation
class Product {
    protected $id;
    protected $name;
    protected $description;
    protected $price;

// Constructor populates the attributes:
    /**
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     */
    public function __construct($id,$name,$description,$price){
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
}

    /**
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDesc(){
        return $this->description;
    }

    /**
     * @return float
     */
    public function getPrice(){
        return $this->price;
    }
}
//End of Product Class