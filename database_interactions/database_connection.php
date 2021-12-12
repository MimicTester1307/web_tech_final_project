<?php
require "../database_interactions/database_credentials.php";

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
     * This function fetches the results of a query
     * @param null
     */
    public function fetchResults()
    {
        if (!$this->result) return false;

        return mysqli_fetch_all($this->result, MYSQLI_ASSOC);
    }
}

// $conn = new Database();
// if ($conn->openConnection()) {
//     echo "True";
// } else {
//     echo "False";
// }
