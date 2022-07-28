<?php
namespace App\Helpers;


if(!function_exists('route')){
    function route(string $route_name){
        return $_SERVER['DOCUMENT_ROOT'].'/app/conrollers/'.$route_name.'.php';
    }
}
