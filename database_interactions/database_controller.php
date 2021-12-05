<?php
require "CRUD.php";

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
