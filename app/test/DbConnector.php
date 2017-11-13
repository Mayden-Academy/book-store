<?php
use PHPUnit\Framework\TestCase;
require '../src/DbConnector.php';
class DbConnectorTest extends TestCase
{
    public function testConstructor() {
        $db = new \App\DbConnector();
        $this->assertInstanceOf($db, new \PDO());
    }
}