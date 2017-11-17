<?php

namespace App;

class FilterBooks
{
    const STEPSIZE = 10;
    const STEPSEPARATOR = 0.01;
    private $books;
    private $priceRanges;

    /**
     * FilterBooks constructor.
     * @param array $books array of Book objects
     */
    public function __construct(array $books)
    {
        $this->books = $books;
    }

    /**
     * rounds the highest price up, to give the upper limit of the search.
     *
     * @param array $books.
     * @return int - The upper limit of search
     */
    private function getUpperBound(array $books): int
    {
        return (floor(end($books)->price / self::STEPSIZE) + 1) * self::STEPSIZE;
    }

    /**
     * rounds the lowest price down, to give the lower limit of the search.
     *
     * @param array $books
     * @return int - The lower limit of search
     */
    private function getLowerBound(array $books): int
    {
        return floor($books[0]->price / self::STEPSIZE) * self::STEPSIZE;
    }

    /**
     * finds the midpoint of the search rounded to adjust for step size.
     *
     * @param int $lowerBound
     * @param int $upperBound
     * @return int - midpoint
     */
    private function getMidPoint(int $lowerBound, int $upperBound): int
    {
        return ceil(($lowerBound + $upperBound) / (2 * self::STEPSIZE)) * self::STEPSIZE;
    }

    /**
     * stores a price range and adjusted to ensure no overlap.
     *
     * @param int $lowerBound
     * @param int $upperBound
     */
    private function storePriceRange(int $lowerBound, int $upperBound)
    {
        $this->priceRanges[] = ['lowerBound' => $lowerBound, 'upperBound' => $upperBound - self::STEPSEPARATOR];
    }

    /**
     * returns books with price lower than midpoint
     * @param array $books
     * @param int $midPoint
     * @return array - the lower half of books
     */
    private function getLowerHalf(array $books, int $midPoint): array
    {
        return array_values(array_filter($books, function ($book) use ($midPoint) {
            return $book->price < $midPoint;
        }));
    }

    /**
     * returns books with price higher than or equal to midpoint
     * @param array $books
     * @param int $midPoint
     * @return array - the upper half of books
     */
    private function getUpperHalf(array $books, int $midPoint): array
    {
        return array_values(array_filter($books, function ($book) use ($midPoint) {
            return $book->price >= $midPoint;
        }));
    }

    /**
     * if only one book is found, stop looping. If more than one book is found continue looping.
     *
     * @param array $books
     */
    private function stopOrContinueSearching(array $books)
    {
        if (count($books) == 1) {
            $this->endSearch($books);
        } else if (count($books) > 1) {
            $this->search($books);
        }
    }

    /**
     * finds the appropriate price range for the book(s) found and stores it.
     *
     * @param array $books
     */
    private function endSearch(array $books)
    {
        $this->storePriceRange($this->getLowerBound($books), $this->getUpperBound($books));
    }

    /**
     * runs a round of the search to generate price ranges.
     *
     * @param array $books
     */
    private function search(array $books)
    {
        $upperBound = $this->getUpperBound($books);
        $lowerBound = $this->getLowerBound($books);
        $midPoint = $this->getMidPoint($lowerBound, $upperBound);

        if ($this->stepSizeReached($lowerBound, $upperBound)) {
            $this->storePriceRange($lowerBound, $upperBound);
            return;  // stop searching
        }
        $lowerHalf = $this->getLowerHalf($books, $midPoint);
        $this->stopOrContinueSearching($lowerHalf);
        $upperHalf = $this->getUpperHalf($books, $midPoint);
        $this->stopOrContinueSearching($upperHalf);
    }

    /**
     * determines if the search range size is the step size.
     *
     * @param int $lowerBound
     * @param int $upperBound
     * @return bool
     */
    private function stepSizeReached(int $lowerBound, int $upperBound): bool
    {
        return ($upperBound - $lowerBound == self::STEPSIZE);
    }

    /**
     * starts the search to generate price ranges
     *
     * @return array -  price ranges
     */
    public function generatePriceRanges(): array
    {
        if(count($this->books)>0) {
            $this->search($this->books);
            return $this->priceRanges;
        } else {
          return [];
        }
    }
}