<?php 
namespace App\Database\Models;

use App\Http\Request\Validation;


class Furniture extends Product{


    public function setDetails($details = [])
    {
        $this->details = "Dimensions: " .  $details['height'] . "x" . $details['width'] . "x" . $details['length'] . " CM";
    }

    public function validateDetails($details = [])
    {
        
        $validation = new Validation;
        $validation->setInputName("width")->setInput($details['width'])->required()->numeric();
        $validation->setInputName("height")->setInput($details['height'])->required()->numeric();
        $validation->setInputName("length")->setInput($details['length'])->required()->numeric();
        return $validation;
    }
}
?>