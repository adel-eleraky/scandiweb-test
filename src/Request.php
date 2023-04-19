<?php 
namespace src;


class Request {

    public static function getPath(){

        return $_SERVER["REQUEST_URI"];
    }

    public static function getMethod(){

        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public static function getBody(){

        $body = [];
        foreach($_POST as $key => $value){
            $body[$key] = filter_input(INPUT_POST , $key , FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $body;
    }
}
?>