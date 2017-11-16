<?php

namespace App;


class Cart
{
    /**
     * Pushes book id into 'cart' array and keeps track of total books in cart.
     * @param array $bookData (created in ensureCartExists function)
     * @param int $bookId
     * @param float $bookPrice
     * @return array|mixed (assigning values to all the elements created in ensureCartExists function and a cummulative price and number of books in cart)
     */
    public static function addBookToCart(array $bookData, int $bookId, float $bookPrice)
    {
        $bookData = self::ensureCartExists($bookData);
        array_push($bookData['cart']['bookIds'], $bookId);
        $bookData = self::adjustTotalPrice($bookData, $bookPrice);
        $bookData['cart']['totalBooks']++;
        return $bookData;
    }

    /**
     * removes book id from 'cart' array
     * @param array $bookData (created in ensureCartExists function)
     * @param int $bookId
     * @param float $bookPrice
     * @return array|mixed (assigning values to all the elements created in ensureCartExists function and a cummulative  price and number of books in cart)
     */
    public static function removeBookFromCart(array $bookData, int $bookId, float $bookPrice)
    {
        $bookData = self::ensureCartExists($bookData);
        $bookToRemove = array_search($bookId, $bookData['cart']['bookIds']);
        unset($bookData['cart']['bookIds'][$bookToRemove]);
        $bookData = self::adjustTotalPrice($bookData, -$bookPrice);
        $bookData['cart']['totalBooks']--;
        return $bookData;
    }

    /**
     * adjusts total book price as books are added and removed
     * @param array $bookData
     * @param float $bookPrice
     * @return array (the totalPrize dimension of the 'cart' array)
     */
    protected static function adjustTotalPrice(array $bookData, float $bookPrice)
    {
        $bookData['cart']['totalPrice'] += $bookPrice;
        if ($bookData['cart']['totalPrice'] < 0.01) {
            $bookData['cart']['totalPrice'] = 0;
        }
        return $bookData;
    }

    /**
     * creates a multidimensional 'cart' array if one does not exist already
     * @param $bookData either set in previous functions or created as an empty 'cart' array
     * @return mixed (a multidimensional 'cart' array)
     */
    protected static function ensureCartExists($bookData)
    {
        if (!isset($bookData['cart'])) {
            $bookData['cart'] = [];
            $bookData['cart']['bookIds'] = [];
            $bookData['cart']['totalPrice'] = 0;
            $bookData['cart']['totalBooks'] = 0;
        }
        return $bookData;
    }
}
