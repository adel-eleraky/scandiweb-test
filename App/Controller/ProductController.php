<?php 

namespace App\Controller;


use App\Database\Models\Model;
use App\Http\Request\Validation;
use src\Request;
use src\Router;


class ProductController {

    public function index(){

        $products = new Model;
        $productsData =  $products->All();
        return Router::renderView("product-list" , compact("productsData"));
    }

    public function add(){

        $products = new Model;
        $skuValues = $products->skuValues();
        return Router::renderView("add-product" , compact("skuValues"));
    }

    public function save(){


        $validation = new Validation;
        $validation->setInputName("sku")->setInput($_POST['sku'] ?? "")->required()->unique("products" , "sku");
        $validation->setInputName("name")->setInput($_POST['name'] ?? "")->required();
        $validation->setInputName("price")->setInput($_POST['price'] ?? "")->required()->numeric();
        $validation->setInputName("type")->setInput($_POST['type'] ?? "")->required();

        $validationErrors = [ "sku" =>  $validation->getErrorMessage("sku") , 
                            "name" => $validation->getErrorMessage("name") ,
                            "price" =>  $validation->getErrorMessage("price") , 
                            "type" => $validation->getErrorMessage("type")  ];

        if(isset($_POST['type'])){
            $type = "\\App\\Database\\Models\\".$_POST['type'];
            $productType = new $type;
            $validationDetails = $productType->validateDetails([ "weight" => $_POST['weight'] ?? "" , "size" => $_POST['size'] ?? "" , "height" => $_POST['height'] ?? "" , "width" => $_POST['width'] ?? "" , "length" => $_POST['length'] ?? "" ]);
            $validationErrors["details"] = ["weight" => $validationDetails->getErrorMessage("weight") ,
                                "size" => $validationDetails->getErrorMessage("size") ,
                                "width" => $validationDetails->getErrorMessage("width")  ,
                                "height" => $validationDetails->getErrorMessage("height")  , 
                                "length" => $validationDetails->getErrorMessage("length") ];
        }

        if(empty($validationDetails->getErrors()) and empty($validation->getErrors())){

            $productType->setSku($_POST['sku'] ?? "")
                        ->setName($_POST['name'] ?? "")
                        ->setPrice($_POST['price'] ?? "")
                        ->setType($_POST['type'] ?? "")
                        ->setDetails([ "weight" => $_POST['weight'] ?? "" , "size" => $_POST['size'] ?? "" , "height" => $_POST['height'] ?? "" , "width" => $_POST['width'] ?? "" , "length" => $_POST['length'] ?? "" ]);
            
            if($productType->create()){
                header("location:/");
            }else{
                echo "Something Went Wrong";die;
            }
        }else{
            return Router::renderView("add-product" , compact('validationErrors'));
        }
    }


    public function delete(){

        $product = new Model;
        if(isset($_POST['ids'])){
            $product->delete($_POST['ids']);
        }
        header("location:/");
    }
}



?>