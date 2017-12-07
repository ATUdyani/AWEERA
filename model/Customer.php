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

        // view customer details
        public function viewCustomerDetails($field,$search_text){
            // load all data on page ready
            if ($field=="*"){
                $query = "SELECT * FROM registered_customer";
            }
            elseif ($field=="all"){
                $query = "SELECT * FROM registered_customer WHERE cust_id LIKE '%".$search_text
                    ."%' OR first_name LIKE '%".$search_text
                    ."%' OR last_name LIKE '%".$search_text
                    ."%' OR cust_phone LIKE '%".$search_text
                    ."%' OR cust_address LIKE '%".$search_text
                    ."%' OR cust_email LIKE '%".$search_text
                    ."%' OR date_joined LIKE '%".$search_text."%'";
            }
            else{
                $query = "SELECT * FROM registered_customer WHERE ".$field." LIKE '%".$search_text."%'";
            }

            try{
                $result_set = self::$db->executeQuery($query);
                self::$db->verifyQuery($result_set);

                $customer_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Home Address</th>
                                    <th>Email</th>
                                    <th>Date Joined</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>";

                if (self::$db->getNumRows($result_set)>0){
                    while($customer = mysqli_fetch_assoc($result_set)){
                        $customer_list.= "<tr>";
                        $customer_list.= "<td>{$customer['cust_id']}</td>";
                        $customer_list.= "<td>{$customer['first_name']}</td>";
                        $customer_list.= "<td>{$customer['last_name']}</td>";
                        $customer_list.= "<td>{$customer['cust_phone']}</td>";
                        $customer_list.= "<td>{$customer['cust_address']}</td>";
                        $customer_list.= "<td>{$customer['cust_email']}</td>";
                        $customer_list.= "<td>{$customer['date_joined']}</td>";
                        $customer_list.= "<td><a class=\"btn btn-info btn-sm view_data\" name=\"view\" value=\"View\" id=\"{$customer['cust_id']}\"><span class=\"glyphicon glyphicon-edit\"></span>  View</a></td>";
                        $customer_list.= "<td><a class=\"btn btn-danger btn-sm\" name=\"delete\" value=\"Delete\" id=\"{$customer['cust_id']}\"><span class=\"glyphicon glyphicon-trash\"></span>  Delete</a></td>";
                        $customer_list.= "</tr>";
                    }
                    $customer_list .= "</tbody>
                                    </table>";
                    echo $customer_list;
                }
                else{
                    echo "<p>No Search Results Found</p>";
                }
            }catch (Exception $e){
                echo $e;
            }
        }
    }
?>