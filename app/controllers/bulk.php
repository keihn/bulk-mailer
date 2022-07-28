<?php
 require_once '../../vendor/autoload.php';
 require_once '../classes/Messages.php';
 require_once '../classes/Mail.php';
 use Respect\Validation\Validator as v;
 use App\Classes\Messages;
 use App\Classes\Mail;
 use Dotenv\Dotenv;

 $dotenv  =  Dotenv::createImmutable($_SERVER["DOCUMENT_ROOT"]);
 $dotenv->load();

 $username = $_ENV['MAIL_USERNAME'];
 $password = $_ENV['MAIL_PASSWORD'];
 $host     = $_ENV['MAIL_HOST'];
 $port     = $_ENV['MAIL_PORT'];


 $messages = new Messages();
 $mail     = new Mail($host, $username, $password, $port);
 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $request = $_POST;
    
    // print_r($request);
    // die;
    $emails  = $request['emails'];
    $subject = $request['subject'];
    $message = $request['message'];

    if(!v::notEmpty()->stringType()->noWhitespace()->validate($emails)){
        $messages->add('email', 'Invalid email address');
        // header('Location: ../../index.php');
    }

    if(!v::notEmpty()->noWhitespace()->validate($subject)){
        $messages->add('subject', 'Subject cannot be empty');
    }
    
    $emails = explode(',', $emails);
    

    foreach($emails as $email){
        $mail->deliver(
            ['email' => 'danlok@danlok.com', 'name' => 'Test Net'],
            ['email' => $email, 'name' => 'John Doe'],
            $subject,
            $message
        );
    }

}


