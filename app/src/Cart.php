<?php
namespace App;

class Cart
{
    public static function addBookToCart(array $bookData, int $bookId, float $bookPrice)
    {
        $bookData = self::ensureCartExists($bookData);
        array_push($bookData['cart']['bookIds'], $bookId);
        $bookData = self::adjustTotalPrice($bookData, $bookPrice);
        $bookData['cart']['totalBooks']++;
        return $bookData;
    }

    public static function removeBookFromCart(array $bookData, int $bookId, float $bookPrice)
    {
        $bookData = self::ensureCartExists($bookData);
        $bookToRemove = array_search($bookId, $bookData['cart']['bookIds']);
        unset($bookData['cart']['bookIds'][$bookToRemove]);
        $bookData = self::adjustTotalPrice($bookData, -$bookPrice);
        $bookData['cart']['totalBooks']--;
        return $bookData;
    }
    protected static function adjustTotalPrice(array $bookData, float $bookPrice)
    {
        $bookData['cart']['totalPrice'] += $bookPrice;
        if(!count($bookData['cart'])) {
            $bookData['cart']['totalPrice'] = 0;
        }
        return $bookData;
    }

    protected static function ensureCartExists($bookData)
    {
        if (!isset($bookData['cart'])) {
            $bookData['cart']= [];
            $bookData['cart']['bookIds'] = [];
            $bookData['cart']['totalPrice'] = 0;
            $bookData['cart']['totalBooks'] = 0;
        }
        return $bookData;
    }
}

