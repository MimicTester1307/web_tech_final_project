<?php
require "database_credentials.php";

class Database
{
    public $database;
    public $result;


    /**
     * This function opens a connection to the database
     * @param null
     */
    public function openConnection()
    {
        // Try to connect to the database
        $this->database = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);

        // Check connection status
        if (mysqli_connect_errno()) {
            // die("Connection failed: " . mysqli_connect_error());
            return False;
        } else {
            // echo "Connection Successful";
            return True;
        }
        // return $this->database;
    }


    /**
     * This function runs queries on the database
     * @param $query The SQL query to be run
     */
    public function runQuery($query)
    {
        if (!$this->openConnection() || $this->database === null) {
            return False;
        }

        // Executing the query
        $this->result = mysqli_query($this->database, $query);

        if ($this->result) return True;
        else return False;
    }

    /**
     * This function fetches the results of a query
     * @param null
     */
    public function fetchResult()
    {
        if (!$this->result) return False;

        return mysqli_fetch_assoc($this->result);
    }
}

// $conn = new Database();
// $conn->openConnection();
