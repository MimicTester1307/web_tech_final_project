<?php
require "../database_interactions/CRUD.php";

/**
 * This file is the controller file that serves as the intermediate 
 * between the database and the view
 */


/**
 * controller function for fetching products from the database and returning
 * it as an associative array
 */
function fetchProducts()
{
    $crud = new CRUD;
    $request = $crud->fetchProducts();

    if ($request) {
        $record = $crud->fetchResults();
        if (!empty($record)) {
            return $record;
        } else {
            return [];
        }
    } else {
        return False;
    }
}


/**
 * controller function for fetching events from the database and returning 
 * it as an associative array
 */
function fetchEvents()
{
    $crud = new CRUD;
    $request = $crud->fetchEvents();

    if ($request) {
        $record = $crud->fetchResults();
        if (!empty($record)) {
            return $record;
        } else {
            return [];
        }
    } else {
        return False;
    }
}

/**
 * controller function for updating contact table from contact form
 */

function updateContactTable($firstName, $lastName, $email, $industry, $country, $message, $file)
{
    $crud = new CRUD;
    $request = $crud->updateContactTable($firstName, $lastName, $email, $industry, $country, $message, $file);

    if ($request) {
        return true;
    } else {
        return false;
    }
}


/**
 * controller function for updating the event registration table
 */
function updateEventRegistrationTable($id, $firstName, $lastName, $email)
{
    $crud = new CRUD;
    $request = $crud->updateEventRegistrationTable($id, $firstName, $lastName, $email);

    if ($request) {
        return true;
    } else {
        return false;
    }
}


/**
 * controller function for fetching system maintainer details
 */
function fetchSystemMaintainerDetails($email)
{
    $crud = new CRUD;
    $request = $crud->fetchSystemMaintainerDetails($email);

    if ($request) {
        $record = $crud->fetchResults();
        if (!empty($record)) {
            return $record;
        } else {
            return [];
        }
    } else {
        return False;
    }
}


/**
 * controller function for fetching system data
 */
function fetchSystems()
{
    $crud = new CRUD;
    $request = $crud->fetchSystems();

    if ($request) {
        $record = $crud->fetchResults();
        if (!empty($record)) {
            return $record;
        } else {
            return [];
        }
    } else {
        return False;
    }
}


/**
 * Controller function for fetching employee data
 */

function fetchEmployees()
{
    $crud = new CRUD;
    $request = $crud->fetchEmployees();

    if ($request) {
        $record = $crud->fetchResults();
        if (!empty($record)) {
            return $record;
        } else {
            return [];
        }
    } else {
        return False;
    }
}

/**
 * Controller function for fetching a single employee record
 */

function fetchEmployee($id)
{
    $crud = new CRUD;
    $request = $crud->fetchEmployee($id);

    if ($request) {
        $record = $crud->fetchResults();
        if (!empty($record)) {
            return $record;
        } else {
            return [];
        }
    } else {
        return False;
    }
}
/**
 * Controller function for deleting an employee
 */
function deleteEmployee($id)
{
    $crud = new CRUD;
    $request = $crud->deleteEmployee($id);

    if ($request) {
        return true;
    } else {
        return false;
    }
}


// if (fetchSystemMaintainerDetails("ryantdeaux@starlab.io")) {
//     echo "Done";
// } else {
//     echo "False";
// }

// $id = 3;
// $first_name = "Excel";
// $last_name = "Chukwu";
// $email = "excel.chukwu@ashesi.edu.gh";
// $industry = "Automotive";
// $country = "Nigeria";
// $contact_message = "Looking forward to porting your technologies to Ghana!";
// $file = Null;

// // $crud = new CRUD;
// if (updateContactTable($first_name, $last_name, $email, $industry, $country, $contact_message, $file)) {
//     echo "Done";
// } else echo "False";
