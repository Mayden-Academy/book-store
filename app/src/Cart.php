<?php
namespace App;
/**
 *
 */

class Cart
{
    public static function addBookToCart(array $bookData, int $bookId, float $bookPrice)
    {
        var_dump('test1');
        $bookData = self::ensureCartExists($bookData);
        var_dump($bookData);
        array_push($bookData['cart']['bookIds'], $bookId);
        $bookData = self::adjustTotalPrice($bookData, $bookPrice);
        $bookData['cart']['totalBooks']++;
        return $bookData;
    }

    public static function removeBookFromCart(array $bookData, int $bookId, float $bookPrice)
    {

       $bookData = self::ensureCartExists();
        $bookToRemove = array_search($bookId, $bookData['cart']['bookIds']);
        unset($bookData['cart']['bookIds'][$bookToRemove]);
        $bookData = self::adjustTotalPrice($bookData, -$bookPrice);
        $bookData['cart']['totalBooks']--;
        return $bookData;
    }

    protected static function adjustTotalPrice(array $bookData, float $bookPrice)
    {  var_dump('test2');
        $bookData['cart']['totalPrice'] += $bookPrice;
        return $bookData;
    }

    protected static function ensureCartExists($bookData)
    {   var_dump('test3');
        if (!isset($bookData['cart'])) {
            var_dump('test4');
            $bookData['cart']= [];
            $bookData['cart']['bookIds'] = [];
            $bookData['cart']['totalPrice'] = 0;
            $bookData['cart']['totalBooks'] = 0;
        }
        var_dump($bookData);
        return $bookData;
    }
}

