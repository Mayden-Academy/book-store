<?php

use PHPUnit\Framework\TestCase;

require '../src/DbConnector.php';

class DbConnectorTest extends TestCase
{
    public function testConstructor() {
        $conn = new \App\DbConnector();
        $db = $conn->getDb();
        $this->assertInstanceOf(\PDO::class, $db);
    }
}