<?php
namespace App\Classes;

require_once realpath(__DIR__. "/vendor/autoload.php");

use App\Classes\Mail;
use Dotenv\Dotenv;

class Bulk{

    protected $mail;

    public function __construct()
    {
        $env = Dotenv::createImmutable(__DIR__);
        $env->load();

        echo getenv('MAIL_USERNAME');
        
        // $this->mail = new Maii();
    }

    public function single(string $email, string $subject, string $message){
        $this->mail->send();
    }
}