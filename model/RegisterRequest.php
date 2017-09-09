<?php require_once('../model/Database.php') ?>
<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 09-Sep-17
 * Time: 7:59 PM
 */

class RegisterRequest
{
    protected static $first_name;
    protected static $last_name;
    protected static $cust_phone;
    protected static $cust_address;
    protected static $cust_email;

    protected static $db;
    protected static $connection;

    // default constructor
    function __construct(){
        self::$db = new Database();
        self::$connection = self::$db->connect();
    }

    // set email
    function setData($first_name,$last_name,$cust_phone,$cust_address,$cust_email){
        self::$first_name = $first_name;
        self::$last_name = $last_name;
        self::$cust_phone = $cust_phone;
        self::$cust_address = $cust_address;
        self::$cust_email = $cust_email;
    }

    // to view/search all new register requests
    public function searchRegisterRequests($field,$search_text){
        // load all data on page ready
        if ($field=="*"){
            $query = "SELECT * FROM register_request";
        }
        elseif ($field=="all"){
            $query = "SELECT * FROM register_request WHERE first_name LIKE '%".$search_text
                ."%' OR last_name LIKE '%".$search_text
                ."%' OR cust_phone LIKE '%".$search_text
                ."%' OR cust_address LIKE '%".$search_text
                ."%' OR cust_email LIKE '%".$search_text."%'";
        }
        else{
            $query = "SELECT * FROM register_request WHERE ".$field." LIKE '%".$search_text."%'";
        }

        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);

            $request_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Check Request</th>
                                </tr>
                                </thead>
                                <tbody>";

            if (self::$db->getNumRows($result_set)>0){
                while($user = mysqli_fetch_assoc($result_set)){

                    $request_list.= "<tr>";
                    $request_list.= "<td>{$user['first_name']}</td>";
                    $request_list.= "<td>{$user['last_name']}</td>";
                    $request_list.= "<td>{$user['cust_phone']}</td>";
                    $request_list.= "<td>{$user['cust_address']}</td>";
                    $request_list.= "<td>{$user['cust_email']}</td>";
                    $request_list.= "<td><a class=\"btn btn-primary btn-sm edit_data\" name=\"edit\" value=\"Edit\" id=\"{$user['reg_id']}\"><span class=\"glyphicon glyphicon-edit\"></span> Check</a></td>";
                    $request_list.= "</tr>";
                }
                $request_list .= "</tbody>
                                    </table>";
                echo $request_list;
            }
            else{
                echo "<p>No Search Results Found</p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }

    // get all register request data for a particular reg id
    function getUnregisteredCustomerData($reg_id){
        $query = "SELECT * FROM register_request WHERE reg_id='".$reg_id."'";
        try{
            $result = self::$db->executeQuery($query);
            $row = mysqli_fetch_array($result);
            return $row;

        }
        catch(Exception $e){
            echo e;
        }
    }

    // send confirmation mail for register requests
    function sendRegisterConfirmationMail($status){
            /*// the message
            $msg = "Your register request is accepted by AWEERA. \n
            Name : ".self::$first_name." ".self::$last_name."\n
            Phone : ".self::$cust_phone."\n
            Address : ".self::$cust_address."\n
            Email : ".self::$cust_email."\n\n
            Above are your recorded details, please contact us if there are any changes have to be done. 
            \n\nThank you!
            \nAWEERA - Hair and Beauty";

            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);

            // send email
            mail(self::$cust_email,"Request Accepted",$msg);*/

            require '../email/PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;

            $mail->isSMTP();                                   // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                            // Enable SMTP authentication
            $mail->Username = 'aweerateamscorp@gmail.com';          // SMTP username
            $mail->Password = 'aweera123'; // SMTP password
            $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                 // TCP port to connect to

            $mail->setFrom('aweerateamscorp@gmail.com', 'AWEERA');
            $mail->addReplyTo('aweerateamscorp@gmail.com', 'AWEERA');
            $mail->addAddress(self::$cust_email);   // Add a recipient
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            $mail->isHTML(true);  // Set email format to HTML

        if ($status == "Accepted"){
            $bodyContent = "<h1>Thank you for registering with us.</h1>";
            $bodyContent .= "<p>Your register request is accepted by AWEERA.<br>
            Name : ".self::$first_name." ".self::$last_name."<br>
            Phone : ".self::$cust_phone."<br>
            Address : ".self::$cust_address."<br>
            Email : ".self::$cust_email."<br><br>
            Above are your recorded details, please contact us if there are any changes have to be done. 
            <br><br>Thank you!
            <br>AWEERA - Hair and Beauty</p>";
        }
        else{
            $bodyContent = "<h1>Sorry you request is rejected.</h1>";
            $bodyContent .= "<p>Your register request is rejected by AWEERA.<br>
            Name : ".self::$first_name." ".self::$last_name."<br>
            Phone : ".self::$cust_phone."<br>
            Address : ".self::$cust_address."<br>
            Email : ".self::$cust_email."<br><br>
            If you want further clarifications, please contact us if there are any changes have to be done. 
            <br><br>Thank you!
            <br>AWEERA - Hair and Beauty</p>";
        }

        $mail->Subject = 'Email from AWEERA by TeamScorp';
        $mail->Body    = $bodyContent;
        if(!$mail->send()) {
            echo "<h4>Mail NOT sent</h4>";
        } else {
            echo "<h4>Mail has been sent successfully</h4>";
        }
    }
}