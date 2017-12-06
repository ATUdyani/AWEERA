<?php require_once('Database.php') ?>
<?php require_once('Customer.php') ?>


<?php

    class UnregisteredCustomer extends Customer
    {

        // add an unregistered customer
        function addUnregisteredCustomer($first_name,$last_name,$cust_phone,$cust_gender){

            self::$first_name = $first_name;
            self::$last_name = $last_name;
            self::$cust_phone = $cust_phone;
            self::$cust_gender = $cust_gender;
            self::$cust_email = NULL;
            self::$cust_address = NULL;
            self::$date_joined = NULL;

            $last_id=self::$db->getLastId('cust_id','unregistered_customer');

            self::$cust_id = self::$db->generateId($last_id,"UNR");

            $query = "INSERT INTO unregistered_customer (cust_id, first_name, last_name, cust_phone, cust_gender) VALUES ('".self::$cust_id."', '".self::$first_name."', '".self::$last_name."', '"
                .self::$cust_phone."', '".self::$cust_gender."')";

            $query_customer = "INSERT INTO customer (cust_id, first_name, last_name, cust_phone, cust_gender) VALUES ('".self::$cust_id."', '".self::$first_name."', '".self::$last_name."', '"
                .self::$cust_phone."', '".self::$cust_gender."')";

            try{
                $result = self::$db->executeQuery($query);
                $result2 = self::$db->executeQuery($query_customer);
                if ($result AND $result2) {
                    return self::$cust_id;
                }
                else{
                    return 0;
                }
            }
            catch (mysqli_sql_exception $e){
                echo $e;
            }
        }

    }
?>