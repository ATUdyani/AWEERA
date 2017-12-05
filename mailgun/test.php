<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-565b460e26fc70f97225b89895044093');
$domain = "sandbox8613477be73f4a0da45310d80d9c905c.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'Excited User <mailgun@sandbox8613477be73f4a0da45310d80d9c905c.mailgun.org>',
    'to'      => 'Baz <wasuradananjith@gmail.com>',
    'subject' => 'Hello',
    'text'    => 'Testing some Mailgun awesomness!'
));


?>