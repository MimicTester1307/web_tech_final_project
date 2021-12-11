<?php

use PHPUnit\Framework\TestCase;
use App\Models\Database;



$databaseTestObject = new Database;

final class DatabaseTest extends TestCase
{
    /**
     * @test
     */
    public function testDatabaseConnection()
    {
        global $databaseTestObject;
        $databaseTestObject->openConnection();

        $this->assertTrue($this->databaseTestObject);
    }
}
