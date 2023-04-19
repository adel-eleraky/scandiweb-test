<?php

namespace src;

class Router {

    protected array $routes = [];

    public function get($path , $callBack){
        $this->routes["get"][$path] =  $callBack;
    }

    public function post($path , $callBack){
        $this->routes["post"][$path] =  $callBack;
    }

    public function resolve(){

        $method = Request::getMethod() ;
        $path = Request::getPath() ;

        $callBack =  $this->routes[$method][$path] ?? false;
        
        if(! $callBack){
            echo "Not Found";
        }
        elseif(is_array($callBack)){
            return call_user_func([new $callBack[0] , $callBack[1]]);
        }
        
    }

    public static function renderView($view , $params = []){

        foreach($params as $param => $value){
            $$param = $value;
        }
        require_once __DIR__ .  "/../views/$view.php";
    }
}

?>