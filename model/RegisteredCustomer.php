<?php require_once('Database.php') ?>
<?php require_once('Customer.php') ?>


<?php
    class RegisteredCustomer extends Customer
    {
        protected static $password;

        // add a registered customer
        public function addRegisteredCustomer($first_name,$last_name,$cust_phone,$cust_email,$cust_address,$date_joined,$password,$gender){

            self::$first_name = $first_name;
            self::$last_name = $last_name;
            self::$cust_gender = $gender;
            self::$cust_phone = $cust_phone;
            self::$cust_email = $cust_email;
            self::$cust_address = $cust_address;
            self::$date_joined = $date_joined;
            self::$password = $password;
            self::$cust_gender = $gender;

            // get last registered customer id
            $last_id = self::$db->getLastId('cust_id','registered_customer');

            // generate new registered customer id
            self::$cust_id = self::$db ->generateId($last_id,'REG');

            // insert the new registered customer details
            $query = "INSERT INTO registered_customer (cust_id, first_name, last_name,cust_phone,cust_email,cust_address,date_joined,password,cust_gender) VALUES ('".self::$cust_id."', '".self::$first_name."','".self::$last_name."', '".self::$cust_phone."', '".self::$cust_email."', '"
                .self::$cust_address."', '".self::$date_joined."', '".self::$password."', '".self::$cust_gender."')";

            try{
                $result = self::$db->executeQuery($query);
                if ($result){
                    $result_customer = $this -> addCustomer();
                    return $result_customer;
                }
            }
            catch(Exception $e){
                echo $e;
            }
        }


        // get all customer data for a particular registered customer id
        public function getCustomerData($cust_id){
            $query = "SELECT * FROM registered_customer WHERE cust_id='".$cust_id."' AND is_deleted='0'";
            try{
                $result = self::$db->executeQuery($query);
                $row = mysqli_fetch_array($result);
                return $row;
            }
            catch(Exception $e){
                echo $e;
            }
        }

        // search customer details to book an appointment
        public function searchCustomerBookAppointment($field,$search_text){
            // load all data on page ready
            if ($field=="*"){
                $query = "SELECT * FROM registered_customer WHERE is_deleted='0'";
            }
            elseif ($field=="all"){
                $query = "SELECT * FROM registered_customer WHERE (cust_id LIKE '%".$search_text
                    ."%' OR first_name LIKE '%".$search_text
                    ."%' OR last_name LIKE '%".$search_text
                    ."%' OR cust_email LIKE '%".$search_text
                    ."%' OR cust_address LIKE '%".$search_text
                    ."%' OR cust_phone LIKE '%".$search_text
                    ."%' OR date_joined LIKE '%".$search_text."%') AND is_deleted='0'";
            }
            else{
                $query = "SELECT * FROM registered_customer WHERE ".$field." LIKE '%".$search_text."%' AND is_deleted='0'";
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Date Joined</th>
                                    <th>Book Now</th>
                                </tr>
                                </thead>
                                <tbody>";

                if (self::$db->getNumRows($result_set)>0){
                    while($customer = mysqli_fetch_assoc($result_set)){

                        $customer_list.= "<tr>";
                        $customer_list.= "<td>{$customer['cust_id']}</td>";
                        $customer_list.= "<td>{$customer['first_name']}</td>";
                        $customer_list.= "<td>{$customer['last_name']}</td>";
                        $customer_list.= "<td>{$customer['cust_email']}</td>";
                        $customer_list.= "<td>{$customer['cust_phone']}</td>";
                        $customer_list.= "<td>{$customer['cust_address']}</td>";
                        $customer_list.= "<td>{$customer['date_joined']}</td>";
                        $customer_list.= "<td><a class=\"btn btn-info btn-sm\" onclick='loadBookCustomerAppointment(this.id)' name=\"book\" value=\"Book Now\" id=\"{$customer['cust_id']}\"><span class=\"glyphicon glyphicon-edit\"></span>  Book Now</a></td>";
                        $customer_list.= "</tr>";
                    }
                    $customer_list .= "</tbody>
                                    </table>";
                    echo $customer_list;
                }
                else{
                    echo "<p><i>No Search Results Found</i></p>";
                }
            }catch (Exception $e){
                echo $e;
            }
        }

        // search customer details
            public function searchCustomerDetails($field,$search_text){
                // load all data on page ready
                if ($field=="*"){
                    $query = "SELECT * FROM registered_customer WHERE is_deleted='0'";
                }
                elseif ($field=="all"){
                    $query = "SELECT * FROM registered_customer WHERE (cust_id LIKE '%".$search_text
                        ."%' OR first_name LIKE '%".$search_text
                        ."%' OR last_name LIKE '%".$search_text
                        ."%' OR cust_email LIKE '%".$search_text
                        ."%' OR cust_address LIKE '%".$search_text
                        ."%' OR cust_phone LIKE '%".$search_text
                        ."%' OR date_joined LIKE '%".$search_text."%') AND is_deleted='0'";
                }
                else{
                    $query = "SELECT * FROM registered_customer WHERE ".$field." LIKE '%".$search_text."%' AND is_deleted='0'";
                }

            try{
                $result_set = self::$db->executeQuery($query);
                self::$db->verifyQuery($result_set);

                $customer_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date Joined</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>";

                if (self::$db->getNumRows($result_set)>0){
                    while($customer = mysqli_fetch_assoc($result_set)){

                        $customer_list.= "<tr>";
                        $customer_list.= "<td>{$customer['first_name']}</td>";
                        $customer_list.= "<td>{$customer['last_name']}</td>";
                        $customer_list.= "<td>{$customer['cust_email']}</td>";
                        $customer_list.= "<td>{$customer['cust_phone']}</td>";
                        $customer_list.= "<td>{$customer['date_joined']}</td>";
                        $customer_list.= "<td><a class=\"btn btn-info btn-sm view_data\" name=\"view\" value=\"View\" id=\"{$customer['cust_id']}\"><span class=\"glyphicon glyphicon-edit\"></span>  View</a></td>";
                        $customer_list.= "<td><a class=\"btn btn-danger btn-sm delete_data\" name=\"delete\" value=\"Delete\" id=\"{$customer['cust_id']}\"><span class=\"glyphicon glyphicon-trash\"></span>  Delete</a></td>";
                        $customer_list.= "</tr>";
                    }
                    $customer_list .= "</tbody>
                                    </table>";
                    echo $customer_list;
                }
                else{
                    echo "<p><i>No Search Results Found</i></p>";
                }
            }catch (Exception $e){
                echo $e;
            }
        }

        // load upcoming appointments for a particular customer
        public function loadUpcomingAppointments($cust_id){
            // query to retrieve upcoming appointments
            $query = "SELECT * FROM appointment a,employee e,service s WHERE a.cust_id='".$cust_id."'
             AND a.emp_id=e.emp_id AND a.service_id=s.service_id AND appointment_date>='".date("Y-m-d")."'";

            try{
                $result_set = self::$db->executeQuery($query);
                self::$db->verifyQuery($result_set);

                $appointment_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Service</th>
                                    <th>Beautician</th>
                                </tr>
                                </thead>
                                <tbody>";

                if (self::$db->getNumRows($result_set)>0){
                    while($appointment = mysqli_fetch_array($result_set)){

                        $appointment_list.= "<tr>";
                        $appointment_list.= "<td>{$appointment['appointment_id']}</td>";
                        $appointment_list.= "<td>{$appointment['appointment_date']}</td>";
                        $appointment_list.= "<td>{$appointment['start_time']}h</td>";
                        $appointment_list.= "<td>{$appointment['end_time']}h</td>";
                        $appointment_list.= "<td>{$appointment['service_name']}</td>";
                        $appointment_list.= "<td>{$appointment['first_name']} {$appointment['last_name']}</td>";
                    }
                    $appointment_list .= "</tbody>
                                    </table>";
                    echo $appointment_list;
                }
                else{
                    echo "<p>No Upcoming Appointments</p>";
                }
            }catch (Exception $e){
                echo $e;
            }
        }


        // load appointment history for a particular customer
        public function loadAppointmentHistory($cust_id){
            // query to retrieve upcoming appointments
            $query = "SELECT * FROM appointment a,employee e,service s WHERE a.cust_id='".$cust_id."'
             AND a.emp_id=e.emp_id AND a.service_id=s.service_id AND appointment_date<'".date("Y-m-d")."'
             ORDER BY appointment_date DESC LIMIT 20";

            try{
                $result_set = self::$db->executeQuery($query);
                self::$db->verifyQuery($result_set);

                $appointment_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Service</th>
                                    <th>Beautician</th>
                                </tr>
                                </thead>
                                <tbody>";

                if (self::$db->getNumRows($result_set)>0){
                    while($appointment = mysqli_fetch_array($result_set)){

                        $appointment_list.= "<tr>";
                        $appointment_list.= "<td>{$appointment['appointment_id']}</td>";
                        $appointment_list.= "<td>{$appointment['appointment_date']}</td>";
                        $appointment_list.= "<td>{$appointment['start_time']}h</td>";
                        $appointment_list.= "<td>{$appointment['end_time']}h</td>";
                        $appointment_list.= "<td>{$appointment['service_name']}</td>";
                        $appointment_list.= "<td>{$appointment['first_name']} {$appointment['last_name']}</td>";
                    }
                    $appointment_list .= "</tbody>
                                    </table>";
                    echo $appointment_list;
                }
                else{
                    echo "<p>No Previous Appointments</p>";
                }
            }catch (Exception $e){
                echo $e;
            }
        }

        // update profile picture of the customer
        public function updateCustomerProfilePicture($id,$file_name){
            $query = "UPDATE registered_customer SET profile_pic='".$file_name."' WHERE cust_id='".$id."'";

            try{
                $result= self::$db->executeQuery($query);
                return $result;
            }catch (Exception $e){
                return $e;
            }
        }

        // delete a registered customer record
        public function deleteRegisteredCustomer($record_id){
            $query = "UPDATE registered_customer SET is_deleted='1' WHERE cust_id='".$record_id."'";

            try{
                $result= self::$db->executeQuery($query);
                $result_customer = $this -> deleteCustomer($record_id);
                return $result_customer AND $result;

            }catch (Exception $e){
                return $e;
            }
        }

    }
?>