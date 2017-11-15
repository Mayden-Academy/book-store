<?php
/**
 * Created by PhpStorm.
 * User: alexandrk
 * Date: 15/11/2017
 * Time: 09:51
 */



class Cart
{
    public $totalPrice;
    public $arrayOfBookIds;

    public function __construct(Array $arrayOfBookIds, float $totalPrice)
    {
        $this->arrayOfBookIds = $arrayOfBookIds;
        $this->totalPrice = $totalPrice;
    }

    public function addBookToCart($bookId, $bookPrice) {
        array_push($this->arrayOfBookIds, $bookId);
        $this->recalculateTotalPrice($bookPrice);
        $cart["bookIds"] = $this->arrayOfBookIds;
        $cart["totalPrice"] = $this->totalPrice;
        $cart["totalBooks"] = sizeof($this->arrayOfBookIds);
        return $cart;
    }
    public function removeBookFromCart($bookId, $bookPrice) {
        $bookToRemove = array_search($bookId, $this->arrayOfBookIds);
        unset($this->arrayOfBookIds[$bookToRemove]);
        $this->recalculateTotalPrice(-($bookPrice));
        $cart["id"] = $this->arrayOfBookIds;
        $cart["cumulativePrice"] = $this->totalPrice;
        $cart["totalBooks"] = sizeof($this->arrayOfBookIds);
        return $cart;
    }
    protected function recalculateTotalPrice(float $bookPrice) {
        $this->totalPrice += $bookPrice;
    }
}
