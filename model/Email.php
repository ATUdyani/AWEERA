<?php require_once('../model/Database.php')?>
<?php require_once('../model/Service.php')?>
<?php require_once('../model/Employee.php')?>
<?php require_once('../model/RegisteredCustomer.php')?>
<?php require_once('../model/Appointment.php')?>
<?php require_once('../email/PHPMailer/PHPMailerAutoload.php') ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 24-Nov-17
 * Time: 10:54 PM
 */

class Email{

    protected static $db;
    protected static $connection;
    protected static $mail;

    // default constructor
    function __construct(){
        self::$db = new Database();
        self::$connection = self::$db->connect();

        self::$mail = new PHPMailer;

        self::$mail->isSMTP();                                   // Set mailer to use SMTP
        self::$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
        self::$mail->SMTPAuth = true;                            // Enable SMTP authentication
        self::$mail->Username = 'aweerateamscorp@gmail.com';          // SMTP username
        self::$mail->Password = 'aweera123'; // SMTP password
        self::$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
        self::$mail->Port = 587;                                 // TCP port to connect to

        self::$mail->setFrom('aweerateamscorp@gmail.com', 'AWEERA');
        self::$mail->addReplyTo('aweerateamscorp@gmail.com', 'AWEERA');

        self::$mail->isHTML(true);  // Set email format to HTML
    }

    // send confirmation mail for register requests
    function sendRegisterConfirmationMail($status,$first_name,$last_name,$cust_phone,$cust_address,$cust_email,$password){

        self::$mail->addAddress($cust_email);   // Add a recipient
        //self::$mail->addCC('cc@example.com');
        //self::$mail->addBCC('bcc@example.com');

        if ($status == "Accepted"){
            $bodyContent = "<h1>Thank you for registering with us.</h1>";
            $bodyContent .= "<p>Your register request is accepted by AWEERA.<br>
            Name : ".$first_name." ".$last_name."<br>
            Phone : ".$cust_phone."<br>
            Address : ".$cust_address."<br>
            Email : ".$cust_email."<br><br>
            Above are your recorded details, please contact us if there are any changes have to be done. 
            <br><br>Thank you!
            <br>AWEERA - Hair and Beauty</p>";

            self::$mail->Subject = 'Email from AWEERA by TeamScorp';
            self::$mail->Body    = $bodyContent;
            if(!self::$mail->send()) {
                echo "<h4>Mail NOT sent</h4>";
            } else {
                echo "<h4>Request Accepted.</h4>";
                echo "<h4>Mail has been sent successfully.</h4>";

                // get last registered customer id
                $last_id = self::$db->getLastId('cust_id','registered_customer');

                // generate new registered customer id
                $new_id = self::$db ->generateId($last_id,'REG');

                // insert the new record to user table
                $query = "INSERT INTO user (first_name, last_name, email, password, type, user_reg_id) VALUES ('".$first_name."', '".$last_name."', '".$cust_email."', '"
                    .$password."', 'Customer','".$new_id."')";

                try{
                    $result = self::$db->executeQuery($query);
                    if ($result){

                        // get current date to be inserted as joined date
                        $date = date("Y-m-d");

                        // insert the new registered customer details
                        $query = "INSERT INTO registered_customer (cust_id, first_name, last_name,cust_phone,cust_email,cust_address,date_joined,password) VALUES ('$new_id', '".$first_name."','".$last_name."', '".$cust_phone."', '".$cust_email."', '"
                            .$cust_address."', '$date', '".$password."')";

                        echo $query;
                        $result_next = self::$db->executeQuery($query);

                        if ($result_next){

                            // delete the register request
                            $query = "DELETE FROM register_request WHERE cust_email='".$cust_email."'";

                            $result_next_next= self::$db->executeQuery($query);
                            if ($result_next_next) {
                                echo "<h4>User successfully added.</h4>";
                            }
                        }
                    }
                    else{
                        echo "<h4>Failed to add the new registered customer.</h4>";
                    }
                }catch (mysqli_sql_exception $e){
                    echo $e;
                }

            }
        }
        else{
            $bodyContent = "<h1>Sorry your request is rejected.</h1>";
            $bodyContent .= "<p>Your register request is rejected by AWEERA.<br>
            Name : ".$first_name." ".$last_name."<br>
            Phone : ".$cust_phone."<br>
            Address : ".$cust_address."<br>
            Email : ".$cust_email."<br><br>
            If you want further clarifications, please contact us if there are any changes have to be done. 
            <br><br>Thank you!
            <br>AWEERA - Hair and Beauty</p>";

            self::$mail->Subject = 'Email from AWEERA by TeamScorp';
            self::$mail->Body    = $bodyContent;
            if(!self::$mail->send()) {
                echo "<h4>Mail NOT sent</h4>";
            } else {
                echo "<h4>Request Rejected.</h4>";
                echo "<h4>Mail has been sent successfully.</h4>";

                // delete the register request
                $query = "DELETE FROM register_request WHERE cust_email='".$cust_email."'";
                try{
                    $result_next_next= self::$db->executeQuery($query);
                    if ($result_next_next) {
                        echo "<h4>Request Deleted Successfully.</h4>";
                    }
                }
                catch (Exception $ex){
                    echo $ex;
                }
            }
        }
    }

    // send an email when appointment has been made successfully
    function sendAppointmentSuccessEmail($cust_id,$appointment_date,$start_time,$end_time,$emp_id,$service_id){

        try{
            // execute the query and extract the email address of the customer
            $customer = new RegisteredCustomer();
            $row = $customer->getCustomerData($cust_id);
            self::$mail->addAddress($row['cust_email']);

            // execute the query and extract the beautician name
            $beautician = new Employee();
            $row = $beautician->getEmployeeData($emp_id);
            $emp_first_name = $row['first_name'];
            $emp_last_name = $row['last_name'];

            // execute the query and extract the service name
            $service = new Service();
            $row = $service->getServiceData($service_id);
            $service_name = $row['service_name'];

            $bodyContent = "<h1>Your appointment has been made successfully.</h1>";
            $bodyContent .= "
            Appointment Date : ".$appointment_date."<br>
            Appointment Time: ".$start_time." to".$end_time."<br>
            Service : ".$service_name."<br>
            Beautician : ".$emp_first_name." ".$emp_last_name."<br>
            Please contact us if there are any changes have to be done. 
            <br><br>Thank you!
            <br>AWEERA - Hair and Beauty</p>";

            self::$mail->Subject = 'Email from AWEERA by TeamScorp';
            self::$mail->Body    = $bodyContent;
            if(!self::$mail->send()) {
                echo "<h4>Mail NOT sent</h4>";
            } else {
                echo "<h4>Mail has been sent successfully.</h4>";
            }
        }
        catch (Exception $ex){
            echo $ex;
        }
    }

    // send an email when appointment has been cancelled
    function sendAppointmentCancelEmail($appointment_id){

        try{
            // execute the query and extract the details of the particular appointment
            $appointment = new Appointment();
            $row = $appointment->getAppointmentData($appointment_id);

            $appointment_date = $row['appointment_date'];
            $start_time = $row['start_time'];
            $end_time = $row['end_time'];

            $emp_id = $row['emp_id'];
            $service_id = $row['service_id'];
            $cust_id = $row['cust_id'];

            // execute the query and extract the beautician name
            $beautician = new Employee();
            $row = $beautician->getEmployeeData($emp_id);
            $emp_first_name = $row['first_name'];
            $emp_last_name = $row['last_name'];

            // execute the query and extract the service name
            $service = new Service();
            $row = $service->getServiceData($service_id);
            $service_name = $row['service_name'];

            // execute the query and extract the email address of the customer
            $customer = new RegisteredCustomer();
            $row = $customer->getCustomerData($cust_id);
            self::$mail->addAddress($row['cust_email']);

            $bodyContent = "<h1>Your appointment has been cancelled.</h1>";
            $bodyContent .= "
            Appointment Date : ".$appointment_date."<br>
            Appointment Time: ".$start_time." to".$end_time."<br>
            Service : ".$service_name."<br>
            Beautician : ".$emp_first_name." ".$emp_last_name."<br>
            Please contact us immediately, if this is a mistake. 
            <br><br>Thank you!
            <br>AWEERA - Hair and Beauty</p>";

            self::$mail->Subject = 'Email from AWEERA by TeamScorp';
            self::$mail->Body    = $bodyContent;
            if(!self::$mail->send()) {
                echo "<h4>Mail NOT sent</h4>";
            } else {
                echo "<h4>Mail has been sent successfully.</h4>";
            }

        }
        catch (Exception $ex){
            echo $ex;
        }
    }

    // send email with the commenting link
    public function sendCommentEmail($appointment_id){
        try{

            // execute the query and extract the details of the particular appointment
            $appointment = new Appointment();
            $row = $appointment->getAppointmentData($appointment_id);

            $appointment_date = $row['appointment_date'];
            $start_time = $row['start_time'];
            $end_time = $row['end_time'];

            $emp_id = $row['emp_id'];
            $service_id = $row['service_id'];
            $cust_id = $row['cust_id'];

            // execute the query and extract the beautician name
            $beautician = new Employee();
            $row = $beautician->getEmployeeData($emp_id);
            $emp_first_name = $row['first_name'];
            $emp_last_name = $row['last_name'];

            // execute the query and extract the service name
            $service = new Service();
            $row = $service->getServiceData($service_id);
            $service_name = $row['description'];

            // execute the query and extract the email address of the customer
            $customer = new RegisteredCustomer();
            $row = $customer->getCustomerData($cust_id);
            self::$mail->addAddress($row['cust_email']);

            // unique link to comment
            $comment_link = "http://localhost/AWEERA/customer-comment.php?appointment_id=".$appointment_id."&start_time=".$start_time."&end_time=".$end_time."&appointment_date=".$appointment_date."&service_name=".$service_name."&first_name=".$emp_first_name."&last_name=".$emp_last_name."";

            $bodyContent = "<h1>Thank you for using our services.</h1>";
            $bodyContent .= "
            Please visit the below link and comment about the service you received.<br>
            $comment_link
            <br><br>Thank you!
            <br>AWEERA - Hair and Beauty</p>";

            self::$mail->Subject = 'Email from AWEERA by TeamScorp';
            self::$mail->Body    = $bodyContent;
            if(!self::$mail->send()) {
                echo "<h4>Mail NOT sent</h4>";
            } else {
                echo "<h4>Mail has been sent successfully.</h4>";
            }

        }
        catch (Exception $ex){
            echo $ex;
        }
    }
}