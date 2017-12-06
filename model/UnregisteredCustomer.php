<?php require_once('Database.php') ?>


<?php
    class UnregisteredCustomer
    {
        protected static $cust_id;
        protected static $first_name;
        protected static $last_name;
        protected static $cust_phone;
        protected static $cust_gender;
        protected static $db;
        protected static $connection;

        public function __construct(){
            self::$db = new Database();
            self::$connection = self::$db->connect();
        }

        // add an unregistered customer
        function addUnregisteredCustomer($first_name,$last_name,$cust_phone,$cust_gender){
            self::$first_name = $first_name;
            self::$last_name = $last_name;
            self::$cust_phone = $cust_phone;
            self::$cust_gender = $cust_gender;

            self::$cust_email = NULL;
            self::$cust_address = NULL;
            self::$date_joined = NULL;
            self::$password = NULL;

            $last_id=self::$db->getLastId('cust_id','unregistered_customer');

            $id = self::$db->generateId($last_id,"UNR");

            $query_unregistered = "INSERT INTO unregistered_customer (cust_id, first_name, last_name, cust_phone, cust_gender) VALUES ('"
                .$id."', '".self::$first_name."', '".self::$last_name."', '"
                .self::$cust_phone."', '".self::$cust_gender."')";

            $query_customer = "INSERT INTO customer (cust_id, first_name, last_name, cust_phone, cust_gender) VALUES ('"
                .$id."', '".self::$first_name."', '".self::$last_name."', '"
                .self::$cust_phone."', '".self::$cust_gender."')";

            try{
                $result1 = self::$db->executeQuery($query_unregistered);
                $result2 = self::$db->executeQuery($query_customer);
                $result_array =[];
                if ($result1 && $result2){
                    array_push($result_array,"<h4>Unregistered Customer added.</h4>");
                    array_push($result_array,$id);

                }
                else{
                    array_push($result_array,"<h4>Failed to add the new record.</h4>");
                    array_push($result_array,$id);
                }
                return $result_array;
            }catch (mysqli_sql_exception $e){
                echo $e;
            }
        }

    }
?>