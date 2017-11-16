<?php

namespace App;

class FilterBooks
{
    private $books;
    private $priceRanges;

    public function __construct(array $books)
    {
        $this->books = $books;
    }

    private function getUpperBound(array $books): int
    {
        return ceil(end($books)->price / 10) * 10;
    }

    private function getLowerBound(array $books): int
    {
        return floor($books[0]->price /10) * 10;
    }

    private function getMidPoint(int $lowerBound, int $upperBound): int
    {
        return ceil(($lowerBound + $upperBound) / 20) * 10;
    }

    private function storePriceRange(int $lowerBound, int $upperBound) {
        $this->priceRanges[] = ['lowerBound' => $lowerBound, 'upperBound' => $upperBound - 0.01];
    }

    private function getLowerHalf(array $books, int $midPoint):array {
        return array_values(array_filter($books, function ($book) use($midPoint) {
            return $book->price < $midPoint;
        }));
    }

    private function getUpperHalf(array $books, int $midPoint):array {
        return array_values(array_filter($books, function ($book) use($midPoint) {
            return $book->price >= $midPoint;
        }));
    }

    private function stopOrContinueSearching(array $books){
        if (count($books) == 1) {
            $this->endSearch($books);
        } else if (count($books) > 1) {
            $this->search($books);
        }
    }

    private function endSearch(array $books) {
        $this->storePriceRange($this->getUpperBound($books), $this->getLowerBound($books));
    }

    private function search(array $books) {
        $upperBound = $this->getUpperBound($books);
        $lowerBound = $this->getLowerBound($books);
        $midPoint = $this->getMidPoint($lowerBound, $upperBound);

        if ($upperBound - $lowerBound == 10) {
            $this->storePriceRange($lowerBound, $upperBound);
            return;
        }
        $lowerHalf = $this->getLowerHalf($books, $midPoint);
        $this->stopOrContinueSearching($lowerHalf);
        $upperHalf = $this->getUpperHalf($books, $midPoint);
        $this->stopOrContinueSearching($upperHalf);
    }

    public function generatePriceRanges() {
        $this->search($this->books);
    }
    
}

