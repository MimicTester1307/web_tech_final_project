<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\Panther\PantherTestCaseTrait;

require "DatabaseCredentialsTest.php";
include "../database_interactions/database_connection.php";


$databaseTestObject = new Database;

final class DatabaseTest extends TestCase
{
    /**
     * @test
     */
    public function testDatabaseConnection()
    {

        $databaseTestObject->openConnection();

        $this->assertTrue($this->databaseTestObject);
    }
}
