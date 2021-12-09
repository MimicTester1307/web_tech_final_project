<?php
require "database_connection.php";

/**
 * This class controls the operations performed on the database
 */
class CRUD extends Database
{

    /**
     * fetches the company products from the database
     * @return mysqli_query_object
     */
    public function fetchProducts()
    {
        $query = "SELECT * FROM `Products`";

        return $this->runQuery($query);
    }


    public function fetchEvents()
    {
        echo "pass";
    }

    public function fetchSystems()
    {
        echo "pass";
    }

    public function updateSystem($id, $status)
    {
        echo "pass";
    }
}
