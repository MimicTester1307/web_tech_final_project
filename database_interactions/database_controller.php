<?php
require "CRUD.php";

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

function updateContactTable($firstName, $lastName, $email, $industry, $country, $message, $file = null)
{
    $crud = new CRUD;
    $request = $crud->updateContactTable($firstName, $lastName, $email, $industry, $country, $message, $file);

    if ($request) {
        return true;
    } else {
        return true;
    }
}
