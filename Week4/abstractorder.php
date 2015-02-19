<?php
/**
 * Created by PhpStorm.
 * User: KT
 * Date: 2/18/2015
 * Time: 11:13 AM
 */
/**
 *
 */
class Abstractorder implements Iterator, Countable {
    protected $orderid;
    protected $products = array();
    protected $position = 0;

    /**
     *Sets up the order for use
     */
    function __construct(){
        $this->orderid;
        $this->products = array();
        $this->ids = array();
    }
    /**
     * @return bool
     */
    public function isEmpty(){
        return(empty($this->products));
    }

    /**
     * Adds products to order
     * @param Product $product
     * @throws Exception
     */
    public function addProduct(Product $product){
    $id = $product->getID();

    if (!$id) throw new Exception('This order requires products with a unique product ID!');

    if (isset($this->products[$id])) {
        $this->updateProduct($product, $this->products[$product]['qty'] + 1);
    }else {
        $this->products[$id] = array('product' => $product, 'qty' => 1);
        $this->ids[] = $id;
    }
}

    /**
     * Changes quantity for products in order
     * @param Product $product
     * @param $qty
     */
    public function updateProduct(Product $product, $qty){

    $id = $product->getId();

    if ($qty === 0) {
        $this->deleteProduct($product);
    }
    elseif (($qty > 0) && ($qty != $this->products[$id]['qty'])){
        $this->products[$id]['qty'] = $qty;
    }
}
    /**
     ** @param Product $product
     */
    public function deleteProduct(Product $product){

        $id = $product->getId();
        if (isset($this->products[$id])){
            unset($this->products[$id]);

            $index = array_search($id, $this->ids);
            unset($this->ids[$index]);

            $this->ids = array_values($this->ids);
        }
    }
    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        $index = $this->ids[$this->position];
        return $this->products[$index];

    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return (isset($this->ids[$this->position]));
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     */
    public function count()
    {
        return count($this->products);
    }
}