<?php 
namespace App\Database\Models;

use App\Database\Config\Connection;

class Model extends Connection{

    public function All(){
        $query = "SELECT * FROM products";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function delete($id){
        $query = "DELETE FROM products WHERE id = ?";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("i" , $id);
        return $statement->execute();
    }

    public function skuValues(){
        $productsData = $this->All();
        $skuValues = [];
        foreach($productsData as $Product){
            $skuValues[] = $Product["sku"];
        }
        return $skuValues;
    }
}

?>