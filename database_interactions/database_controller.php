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
