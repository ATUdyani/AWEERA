<?php

require_once "sms/lib/SMSSender.php";

define('SERVER_URL', 'http://localhost'); // Set the Server URL
define('APP_ID', 'appid');							  // Set the APPID
define('APP_PASSWORD', 'pass');						 // Set the password

// Create Sender intialze the object with the SeverURL , APPID and APP Password
$sender = new SMSSender( SERVER_URL, APP_ID,  APP_PASSWORD);

$sender->sms( 'This message is send to one particlar no', 0775396038);
?>