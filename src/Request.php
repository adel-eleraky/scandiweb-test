<?php

namespace src;

class Request
{
    public static function getPath()
    {

        return $_SERVER["REQUEST_URI"];
    }

    public static function getMethod()
    {

        return strtolower($_SERVER["REQUEST_METHOD"]);
    }


}
