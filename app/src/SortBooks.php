<?php

namespace App;

class SortBooks
{
    private $books;

    /**
     * FilterBooks constructor.
     * @param array $books array of Book objects
     */
    public function __construct(array $books)
    {
        $this->books = $books;
    }

    /**
     * sorts the books, lowest to highest price
     * @return array- the sorted array of books
     */
    public function getBooksPriceAscending(): array
    {
        usort($this->books, [self::class, "comparePrices"]);
        return $this->books;
    }

    /**
     * compares the prices of two books. Tests if a is more expensive than b
     *
     * @param Book $a
     * @param Book $b
     * @return bool True if a is more expensive than b
     */
    private static function comparePrices(Book $a, Book $b)
    {
        return $a->price > $b->price;
    }
}