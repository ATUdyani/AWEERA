<?php 

require_once "vendor/autoload.php";

$client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic('c504daba','2bfaadb89fb1e886'));

$message = $client->message()->send([
    'to' => +94775396038,
    'from' => NEXMO,
    'text' => 'Test message from the Nexmo PHP Client'
]);


?>