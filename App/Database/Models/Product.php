<?php 
namespace App\Database\Models;

use App\Database\Models\Model;

abstract class Product extends Model{

    protected $id , $sku , $name , $price , $type , $details; 


    public function create(){
        $query = "INSERT INTO products ( sku , name , price , category , details ) VALUES ( ? , ? , ? , ? , ?)";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("ssiss" , $this->sku , $this->name , $this->price , $this->type , $this->details);
        return $statement->execute();
    }

    public abstract function setDetails($details = []);

    public abstract function validateDetails($details = []);

    
    /**
     * Set the value of sku
     *
     * @return  self
     */ 
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

}

?>