<?php 
namespace src;


class Request {

    public function getPath(){

        return $_SERVER["REQUEST_URI"];
    }

    public function getMethod(){

        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
}
?>