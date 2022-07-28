<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailing</title>
</head>
<body>
    <?php

        use App\Classes\Messages;

        require_once __DIR__.'/vendor/autoload.php'; 
        require_once __DIR__.'/app/classes/Messages.php';

        // $message = new Messages();
        // echo $message->get('email');
        // $message->delete($email);
    
    ?> 
    <form action="app/controllers/bulk.php" method="post">
        <input type="text" name="subject" id="" placeholder="Subject">
        <input type="text" name="emails" id="" placeholder="Emails">
        <textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
        <button type="submit">SEND</button>
    </form>
</body>
</html>