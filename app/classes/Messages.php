<?php


namespace App\Classes;


class Messages{

    public $messages;

    public function __construct()
    {
        if(!session_start()){
            session_start();
        }
    }

    public function add(string $type, string $message){
        $_SESSION[$type] = $message;

    }

    public function get($type){
        if(array_key_exists($type, $_SESSION)){
            return $_SESSION[$type];
        }
        return;
    }

    public function delete(string $type){
        if(array_key_exists($type, $_SESSION)){
            unset($_SESSION[$type]);
        }
    }
}