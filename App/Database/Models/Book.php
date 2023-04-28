<?php 
namespace App\Database\Models;

use App\Http\Request\Validation;

class Book extends Product{

    
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