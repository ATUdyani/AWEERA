<?php require_once('../model/Database.php') ?>


<?php
    class RegisteredCustomer
    {
        protected static $cust_id;
        protected static $first_name;
        protected static $last_name;
        protected static $cust_email;
        protected static $cust_phone;
        protected static $cust_address;
        protected static $date_joined;
        protected static $db;
        protected static $connection;

        public function __construct(){
            self::$db = new Database();
            self::$connection = self::$db->connect();
        }

        // get all customer data for a particular customer id
        public function getCustomerData($cust_id){
            $query = "SELECT * FROM registered_customer WHERE cust_id='".$cust_id."'";
            try{
                $result = self::$db->executeQuery($query);
                $row = mysqli_fetch_array($result);
                return $row;
            }
            catch(Exception $e){
                echo e;
            }
        }
    }
?>