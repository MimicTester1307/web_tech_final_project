<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\Panther\PantherTestCaseTrait;


include "";


final class DatabaseTest extends TestCase
{
    use PantherTestCaseTrait;
    /**
     * @test
     */

    private $database;
    private $result;

    public function testDatabaseConnection()
    {
        $connection = new \App\Model\DatabaseConnection;

        $connection->openConnection();

        $this->assertTrue(true);
    }
}
