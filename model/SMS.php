<?php
//
//require '../sms/twilio/vendor/autoload.php';
//
//// Use the REST API Client to make requests to the Twilio REST API
//use Twilio\Rest\Client;
//
///**
// * Created by PhpStorm.
// * User: Wasura Dananjith
// * Date: 29-Dec-17
// * Time: 2:13 PM
// */
//
//class SMS
//{
//
//    protected static $sid;
//    protected static $token;
//    protected static $client;
//
//    // default constructor
//    function __construct(){
//        self::$sid = 'ACbfd86e4ab42c46c362c0c92e685abda8';
//        self::$token = '5aba484a821437c6786da7b8fb8e3e09';
//        self::$client = new Client(self::$sid, self::$token);
//    }
//
//    // send a sms when appointment has been made successfully
//    function sendAppointmentSuccessSMS($cust_phone,$appointment_date,$start_time,$end_time,$emp_first_name,$emp_last_name,$service_name){
//
//        try{
//            $contactno1=substr($cust_phone,1,9);
//            $contactno2='+94'.$contactno1;
//            $msg_body = "Your Appointment for ".$service_name.", is on ".$appointment_date
//                .", from ".$start_time."h to ".$end_time."h, with ".$emp_first_name." ".$emp_last_name." - From AWEERA";
//
//            self::$client->messages->create(
//            // the number you'd like to send the message to
//                $contactno2,
//                array(
//                    // A Twilio phone number you purchased at twilio.com/console
//                    'from' => '+18315316720 ',
//                    // the body of the text message you'd like to send
//                    'body' => $msg_body,
//                    'statusCallback' => "https://requestb.in/17orvht1"
//                )
//            );
//
//            $result = file_get_contents('https://requestb.in/17orvht1');
//
//            if ($result=="ok"){
//                echo "<h4>SMS has been sent successfully.</h4>";
//            }
//            else{
//                echo "<h4>SMS NOT sent</h4>";
//            }
//        }
//        catch (Exception $e){
//            echo $e;
//        }
//
//
//    }
//
//    // send a sms when appointment has been made successfully
//    function sendAppointmentCancelSMS($cust_phone,$appointment_date,$start_time,$end_time,$emp_first_name,$emp_last_name,$service_name){
//
//        try{
//            $contactno1=substr($cust_phone,1,9);
//            $contactno2='+94'.$contactno1;
//            $msg_body = "Cancelled - Your Appointment for ".$service_name.", on ".$appointment_date
//                .", from ".$start_time."h to ".$end_time."h, with ".$emp_first_name." ".$emp_last_name." - From AWEERA";
//
//            self::$client->messages->create(
//            // the number you'd like to send the message to
//                $contactno2,
//                array(
//                    // A Twilio phone number you purchased at twilio.com/console
//                    'from' => '+18315316720 ',
//                    // the body of the text message you'd like to send
//                    'body' => $msg_body,
//                    'statusCallback' => "https://requestb.in/17orvht1"
//                )
//            );
//
//            $result = file_get_contents('https://requestb.in/17orvht1');
//
//            if ($result=="ok"){
//                echo "<h4>SMS has been sent successfully.</h4>";
//            }
//            else{
//                echo "<h4>SMS NOT sent</h4>";
//            }
//        }
//        catch (Exception $e){
//            echo $e;
//        }
//    }
//
//    // send a sms when register request is rejected/accepted
//    function sendRegisterConfirmationSMS($status,$first_name,$last_name,$cust_phone){
//        try{
//            $contactno1=substr($cust_phone,1,9);
//            $contactno2='+94'.$contactno1;
//
//            if ($status=="Accepted"){
//                $msg_body = "Thank you for registering with us, ".$first_name." ".$last_name.". Your register request is accepted - From AWEERA";
//            }
//            else{
//                $msg_body = "Sorry your request is rejected, ".$first_name." ".$last_name.". - From AWEERA";
//            }
//
//            self::$client->messages->create(
//            // the number you'd like to send the message to
//                $contactno2,
//                array(
//                    // A Twilio phone number you purchased at twilio.com/console
//                    'from' => '+18315316720 ',
//                    // the body of the text message you'd like to send
//                    'body' => $msg_body,
//                    'statusCallback' => "https://requestb.in/17orvht1"
//                )
//            );
//
//            $result = file_get_contents('https://requestb.in/17orvht1');
//
//            if ($result=="ok"){
//                echo "<h4>SMS has been sent successfully.</h4>";
//            }
//            else{
//                echo "<h4>SMS NOT sent</h4>";
//            }
//        }
//        catch (Exception $e){
//            echo $e;
//        }
//    }
//
//}