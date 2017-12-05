<?php
// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'ACbfd86e4ab42c46c362c0c92e685abda8';
$token = '5aba484a821437c6786da7b8fb8e3e09';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+94775396038',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+18315316720 ',
        // the body of the text message you'd like to send
        'body' => 'Hey Jenny! Good luck on the bar exam!'
    )
);

?>