<?php
function send_mailgun($email){

    $config = array();

    $config['api_key'] = "pubkey-ec3023e2f0001212818f526c6c1ce148";

    $config['api_url'] = "https://api.mailgun.net/v2/sandbox8613477be73f4a0da45310d80d9c905c.mailgun.org/messages";

    $message = array();

    $message['from'] = "My Company &lt;postmaster@domain.com&gt;";

    $message['to'] = $email;

    $message['h:Reply-To'] = "&lt;info@domain.com&gt;";

    $message['subject'] = "Eye-Catching Subject Line";

    $message['html'] = "hello";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $config['api_url']);

    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS,$message);

    $result = curl_exec($ch);

    curl_close($ch);

    return $result;

}

$json = send_mailgun('wasuradananjith@gmail.com');
if ($json){
    echo "Success";
}
else{
    echo "failed";
}

?>