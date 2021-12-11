<?php

namespace App\Models;

use App\Models\DatabaseCredentials;

class Database
{
    public $database;
    public $result;


    /**
     * model function for testing database connection
     */
    public function openConnection()
    {
        $credentials = new DatabaseCredentials;

        $this->database = mysqli_connect($credentials->SERVERNAME, $credentials->USERNAME, $credentials->PASSWORD, $credentials->DATABASE);

        // Check connection status
        if (mysqli_connect_errno()) {
            return False;
        } else {
            return True;
        }
    }

    /**
     * model function for running queries
     */
    public function runQuery($query)
    {
        if (!$this->openConnection() || $this->database == null) {
            return false;
        }

        // Executing the query
        $this->result = mysqli_query($this->database, $query);

        if ($this->result == false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Model function for fetching results
     */
    public function fetchResults()
    {
        if (!$this->result) return false;

        return mysqli_fetch_all($this->result, MYSQLI_ASSOC);
    }
}
