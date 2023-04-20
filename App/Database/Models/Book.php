<?php 
namespace App\Database\Models;

use App\Http\Request\Validation;

class Book extends Product{

    public function create()
    {
        $query = "INSERT INTO products ( sku , name , price , category , details ) VALUES ( ? , ? , ? , 'Book' , ?)";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("ssis" , $this->sku , $this->name , $this->price , $this->details);
        return $statement->execute();
    }

    public function setDetails($details = [])
    {
        $this->details = "Weight: " . $details['weight'] . " KG";
    }

    public function validateDetails($details = [])
    {
        $validation = new Validation;
        $validation->setInputName("weight")->setInput($details['weight'])->required()->numeric();
        return $validation;
    }
}
?>