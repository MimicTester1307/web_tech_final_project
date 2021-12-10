<?php

use phpDocumentor\Reflection\Types\Null_;

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
     * Selects the system maintainer email and password because only them can log into the admin dashboard.
     * @return mysqli_query_object
     */
    public function fetchSystemMaintainerDetails($email)
    {
        $query = "SELECT Employee.employee_id, Employee.employee_email, Employee.employee_password 
        FROM `Employee` INNER JOIN System_Maintainer 
        ON Employee.employee_id = System_Maintainer.employee_id 
        AND Employee.employee_email='$email'";

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

    /**
     * updates the contact table with data from the contact us form
     * @return mysqli_query_object
     */
    public function updateContactTable($firstName, $lastName, $email, $industry, $country, $message, $file)
    {
        $query = "INSERT INTO `Contact_Us`(first_name, last_name, email, industry, country, contact_message, contact_file) VALUES ('$firstName', '$lastName', '$email', '$industry', '$country', '$message', '$file')";
        return $this->runQuery($query);
    }

    /**
     * updates the event registration table when a user registers  -- should ideally send the user a link to the event, but did not implement that
     * @return mysqli_query_object
     */
    public function updateEventRegistrationTable($id, $firstName, $lastName, $email)
    {
        $query = "INSERT INTO `Event_Registration`(event_id, participant_first_name, participant_last_name, participant_email) VALUES ('$id', '$firstName', '$lastName', '$email')";
        return $this->runQuery($query);
    }


    /**
     * Fetches all Employees in the company and their details
     * @return mysqli_query_object
     */
    public function fetchEmployees()
    {
        $query = "SELECT * FROM `Employee`";
        return $this->runQuery($query);
    }


    /**
     * Fetches a single employee from the table
     * @return mysqli_query_object
     */
    public function fetchEmployee($id)
    {
        $query = "SELECT * FROM `Employee` WHERE employee_id = '$id'";
        return $this->runQuery($query);
    }

    /** 
     * Deletes an Employee from the Table. Implements Soft Deletion
     * @return mysqli_query_object
     */
    public function deleteEmployee($id)
    {
        $query = "DELETE FROM `Employee` WHERE employee_id = '$id'";
        return $this->runQuery($query);
    }
}


// $id = 3;
// $first_name = "Excel";
// $last_name = "Chukwu";
// $email = "excel.chukwu@ashesi.edu.gh";
// // $industry = "Automotive";
// // $country = "Nigeria";
// // $contact_message = "I love StarLab!";
// // $file = Null;

// $crud = new CRUD;
// if ($crud->updateEventRegistrationTable($id, $first_name, $last_name, $email)) {
//     echo "Done";
// } else echo "False";
