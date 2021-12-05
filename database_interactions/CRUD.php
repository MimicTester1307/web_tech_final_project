<?php
require "database_connection.php";

class CRUD extends Database
{

    public function fetchProducts()
    {
        $query = 'SELECT product_id, product_name, product_category, product_version, product_description, product_image 
        FROM Products';

        // $query = "SELECT Products.product_id, Products.product_category, Products.product_name, Products.product_description, Products.product_image, Product.product_version
        // FROM Products 
        // WHERE Products.product_category IN ('Operating Systems', 'Embedded Systems', 'Cyber Security')
        // ORDER BY Products.product_category";

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
