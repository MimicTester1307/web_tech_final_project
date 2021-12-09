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


    /**
     * fetches the available events from the database
     * @return mysqli_query_object
     */
    public function fetchEvents()
    {
        $query = "SELECT * FROM `Events` ORDER BY Events.event_date";
        return $this->runQuery($query);
    }


    /**
     * fetches system information from the database
     * @return mysqli_query_object
     */
    public function fetchSystems()
    {
        $query = "SELECT * FROM `Systems`";
        return $this->runQuery($query);
    }

    /**
     * updates the system status and time of last_access
     * @return mysqli_query_object
     */
    public function updateSystem($id, $status)
    {
        $query = "UPDATE `Systems` SET system_status = '$status', date_of_last_check=NOW() WHERE system_id = '$id'";
        return $this->runQuery($query);
    }
}
