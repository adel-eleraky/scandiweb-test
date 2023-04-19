<?php 
namespace App\Database\Models;

use App\Http\Request\Validation;


class Furniture extends Product{

    public function create()
    {
        $query = "INSERT INTO products ( sku , name , price , category , details ) VALUES ( ? , ? , ? , 'Furniture' , ?)";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("ssis" , $this->sku , $this->name , $this->price , $this->details);
        return $statement->execute();
    }

    public function setDetails($details = [])
    {
        $this->details = "Dimensions: " .  $details['height'] . "x" . $details['weight'] . "x" . $details['length'] . " CM";
    }

    public function validateDetails($details = [])
    {
        
        $validation = new Validation;
        $validation->setInputName("width")->setInput($details['width'])->required()->numeric();
        $validation->setInputName("height")->setInput($details['height'])->required()->numeric();
        $validation->setInputName("length")->setInput($details['length'])->required()->numeric();
        return $validation->getErrors();
    }
}
?>