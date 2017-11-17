<?php
use PHPUnit\Framework\TestCase;

require "../src/Store.php";

class StoreTest extends TestCase {
    public function testStore() {
        $this->markTestSkipped('Untestable class because of DB dependency');
    }
}