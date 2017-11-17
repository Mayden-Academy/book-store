<?php

use PHPUnit\Framework\TestCase;

require "../src/Cart.php";

class CartTest extends TestCase
{
    //integration test
    public function testaddBookToCart()
    {
        $bookData = [];
        $bookId = 1;
        $bookPrice = 9.99;

        $bookData = \App\Cart::addBookToCart($bookData, $bookId, $bookPrice);
        $expectedData = ['cart' => ['bookIds' => [1], 'totalBooks' => 1, 'totalPrice' => 9.99]];
        $this->assertEquals($expectedData, $bookData);

        $bookId = 5;
        $bookData = \App\Cart::addBookToCart($bookData, $bookId, $bookPrice);
        $expectedData = ['cart' => ['bookIds' => [1, 5], 'totalBooks' => 2, 'totalPrice' => 19.98]];
        $this->assertEquals($expectedData, $bookData);

    }

    //integration test
    public function testremoveBookFromCart()
    {
        $bookData = ['cart' => ['bookIds' => [5, 1], 'totalBooks' => 2, 'totalPrice' => 350.50]];
        $bookId = 1;
        $bookPrice = 10.00;

        $bookData = \App\Cart::removeBookFromCart($bookData, $bookId, $bookPrice);
        $expectedData = ['cart' => ['bookIds' => [5], 'totalBooks' => 1, 'totalPrice' => 340.50]];
        $this->assertEquals($expectedData, $bookData);
    }
}