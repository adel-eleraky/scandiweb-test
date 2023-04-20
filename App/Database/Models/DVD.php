<?php 
namespace App\Database\Models;

use App\Http\Request\Validation;


class DVD extends Product{

    public function create()
    {
        $query = "INSERT INTO products ( sku , name , price , category , details ) VALUES ( ? , ? , ? , 'DVD' , ?)";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("ssis" , $this->sku , $this->name , $this->price , $this->details);
        return $statement->execute();
    }

    public function setDetails($details = [])
    {
        $this->details = "Size: " . $details['size'] . " MB";
    }

    public function validateDetails($details = [])
    {
        $validation = new Validation;
        $validation->setInputName("size")->setInput($details['size'])->required()->numeric();
        return $validation;
    }
}
?>