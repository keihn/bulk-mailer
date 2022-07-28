<?php 
namespace App\Classes;

require_once '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mail{
    
    private  $host = '';
    private  $username = '';
    private  $password = '';
    private  $port = '';


    public function __construct($host, $username, $password, $port=465)
    {
        
        $this->host     = $host;
        $this->username = $username;
        $this->password = $password;
        $this->port     = $port;

    }


    public function deliver($from, $to,  $subject,  $message)
    {
        
        $mailer = new PHPMailer(true);
        
        try{
            
            $mailer->SMTPDebug = SMTP::DEBUG_SERVER;                     
            $mailer->isSMTP();                                         
            $mailer->Host       = $this->host;                   
            $mailer->SMTPAuth   = true;                                  
            $mailer->Username   = $this->username;                   
            $mailer->Password   = $this->password;                           
            $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mailer->Port       = $this->port; 
            $mailer->setFrom($from['email'], $from['name']);
            $mailer->addAddress($to['email'], $to['name']);     //Add a recipient
            $mailer->isHTML(true);                                  //Set email format to HTML
            $mailer->Subject = $subject;
            $mailer->Body    = $message;
            
            $mailer->send();
            
        }catch(Exception $e){
            error_log($e);
        }
        

    }
}