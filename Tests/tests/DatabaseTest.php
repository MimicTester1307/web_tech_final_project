<?php

use PHPUnit\Framework\TestCase;
use App\Models\Database;
use App\Models\DatabaseCredentials;



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
