<?php require_once('Database.php') ?>


<?php
    class Customer
    {
        protected static $cust_id;
        protected static $first_name;
        protected static $last_name;
        protected static $cust_email;
        protected static $cust_phone;
        protected static $cust_address;
        protected static $date_joined;
        protected static $cust_gender;

        protected static $db;
        protected static $connection;

        public function __construct(){
            self::$db = new Database();
            self::$connection = self::$db->connect();
        }

        // add a customer
        public function addCustomer()
        {
            // insert the new customer details
            $query = "INSERT INTO customer (cust_id, first_name, last_name,cust_phone,cust_email,cust_address,date_joined,cust_gender) VALUES ('".self::$cust_id."', '".self::$first_name."','".self::$last_name."', '".self::$cust_phone."', '".self::$cust_email."', '"
                .self::$cust_address."', '".self::$date_joined."', '".self::$cust_gender."')";

            try {
                $result = self::$db->executeQuery($query);
                return $result;
            } catch (Exception $e) {
                echo $e;
            }
        }

        // get all customer data for a particular customer id
        public function getCustomerData($cust_id){
            $query = "SELECT * FROM customer WHERE cust_id='".$cust_id."'";
            try{
                $result = self::$db->executeQuery($query);
                $row = mysqli_fetch_array($result);
                return $row;
            }
            catch(Exception $e){
                echo $e;
            }
        }
    }
?>