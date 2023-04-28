<?php 
namespace App\Database\Models;

use App\Http\Request\Validation;


class DVD extends Product{


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