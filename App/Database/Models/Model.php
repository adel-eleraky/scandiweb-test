<?php

namespace App\Database\Models;

use App\Database\Config\Connection;

class Model extends Connection
{
    // function to get all products from database
    public function All()
    {
        $query = "SELECT * FROM products";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // function to do mass delete
    public function delete($ids = [])
    {
        $ids = implode(",", array_values($ids));
        $query = "DELETE FROM products WHERE id IN ($ids)";
        $statement = $this->conn->prepare($query);
        return $statement->execute();
    }

    // function to get all sku values
    public function skuValues()
    {
        $productsData = $this->All();
        $skuValues = [];
        foreach($productsData as $Product) {
            $skuValues[] = $Product["sku"];
        }
        return $skuValues;
    }
}
