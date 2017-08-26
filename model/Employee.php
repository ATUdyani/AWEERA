<?php require_once('../model/Database.php') ?>

<?php  
	
	class Employee{

	    protected static $emp_id;
		protected static $first_name;
		protected static $last_name; 
		protected static $emp_email; 
		protected static $emp_phone;
		protected static $emp_address;
        protected static $emp_type;
        protected static $emp_gender;
        protected static $emp_services =[];
		protected static $db;
		protected static $connection;

        public function __construct(){
            self::$db = new Database();
            self::$connection = self::$db->connect();
        }

        // set all the fields
        public function setEmployee($first_name,$last_name,$emp_email,$emp_phone,$emp_address,$emp_type,$emp_gender){
            self::$first_name = $first_name;
            self::$last_name = $last_name;
            self::$emp_email = $emp_email;
            self::$emp_phone = $emp_phone;
            self::$emp_address = $emp_address;
            self::$emp_type = $emp_type;
            self::$emp_gender = $emp_gender;

        }

        // get all employee data for a particular employee id
        public function getEmployeeData($emp_id){
            $query = "SELECT * FROM employee WHERE emp_id='".$emp_id."'";
            try{
                $result = self::$db->executeQuery($query);
                $row = mysqli_fetch_array($result);
                return $row;

            }
            catch(Exception $e){
                echo e;
            }
        }

        // add employee service list to the database
        public function addEmployeeServices($emp_services){
            self::$emp_services = $emp_services;

            $last_id=self::$db->getLastRecordId('emp_id','employee');

            foreach ( self::$emp_services as $service) {
                $query = "INSERT INTO beautician_service (emp_id, service_id) VALUES ('".$last_id."', '"
                    .$service."')";

                try{
                    $result = self::$db->executeQuery($query);
                    if (!$result){
                        echo "Failed to add the new record to the beautician_service table.";
                    }
                }catch (mysqli_sql_exception $e){
                    echo $e;
                }
            }
        }

        /*
		function checkErrors(){
			$errors = array();

			if (isset($_POST['submit'])){

				// checking required fields

				if (empty($_POST['first_name'])){
					$errors[] = 'First Name is required';
				}
			}
			return $errors;
"		}*/

        // add a new employee
		function addEmployee(){
		    $last_id=self::$db->getLastId('emp_id','employee');

		    $id = self::$db->generateId($last_id,"EMP");

		    echo $id;

			$query = "INSERT INTO employee (emp_id, first_name, last_name, emp_email, emp_phone, emp_address, emp_type,emp_gender) VALUES ('"
                .$id."', '".self::$first_name."', '".self::$last_name."', '".self::$emp_email."', '"
                .self::$emp_phone."', '".self::$emp_address."', '".self::$emp_type."', '".self::$emp_gender."')";

			echo $query;

            try{
                $result = self::$db->executeQuery($query);
                if ($result){
                    echo "Employee successfully added.";
                }
                else{
                    echo "Failed to add the new record.";
                }
            }catch (mysqli_sql_exception $e){
			    echo $e;
            }
		}

		// update employee details
        public function updateEmployee($emp_id){
		    $query = "UPDATE employee SET first_name='".self::$first_name
                ."', last_name = '".self::$last_name."', emp_email = '".self::$emp_email."', emp_phone = '"
                .self::$emp_phone."', emp_address = '"
                .self::$emp_address."', emp_gender = '".self::$emp_gender."' WHERE emp_id ='$emp_id'";

            try{
                $result_set = self::$db->executeQuery($query);
                self::$db->verifyQuery($result_set);
                if ($result_set){
                    echo "Employee successfully updated.";
                }

            }catch (Exception $e){
                echo $e;
            }

        }

		// load employee details to a table
        public function loadEmployeeDetails(){
            $employee_list ='';

            //getting list of employee items
            $query = "SELECT * FROM employee ORDER BY emp_type";

            try{
                $result_set = self::$db->executeQuery($query);
                self::$db->verifyQuery($result_set);
                while($employee = mysqli_fetch_assoc($result_set)){
                    $employee_list.= "<tr>";
                    $employee_list.= "<td>{$employee['emp_id']}</td>";
                    $employee_list.= "<td>{$employee['first_name']}</td>";
                    $employee_list.= "<td>{$employee['last_name']}</td>";
                    $employee_list.= "<td>{$employee['emp_email']}</td>";
                    $employee_list.= "<td>{$employee['emp_phone']}</td>";
                    $employee_list.= "<td>{$employee['emp_address']}</td>";
                    $employee_list.= "<td>{$employee['emp_type']}</td>";
                    $employee_list.= "<td><a href=\"modify-User.php?user_id={$employee['emp_id']}\">Edit</a></td>";
                    $employee_list.= "<td><a href=\"delete-User.php?user_id={$employee['emp_id']}\">Delete</a></td>";
                    $employee_list.= "</tr>";
                }
                return $employee_list;
            }catch (Exception $e){
                echo $e;
            }

        }

        // search employee details in-order to add as a user
        public function searchEmployeeUserDetails($field,$search_text){
            // load all data on page ready
            if ($field=="*"){
                $query = "SELECT * FROM employee WHERE is_user='0'";
            }
            elseif ($field=="all"){
                $query = "SELECT * FROM employee WHERE (emp_id LIKE '%".$search_text
                    ."%' OR first_name LIKE '%".$search_text
                    ."%' OR last_name LIKE '%".$search_text
                    ."%' OR emp_email LIKE '%".$search_text
                    ."%' OR emp_address LIKE '%".$search_text
                    ."%' OR emp_phone LIKE '%".$search_text
                    ."%' OR emp_type LIKE '%".$search_text
                    ."%' OR emp_gender LIKE '%".$search_text."%') AND is_user='0'";
            }
            else{
                $query = "SELECT * FROM employee WHERE ".$field." LIKE '%".$search_text."%' AND is_user='0'";
            }

            try{
                $result_set = self::$db->executeQuery($query);
                self::$db->verifyQuery($result_set);

                $employee_list ="<table class=\"table table-hover\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Type</th>
                                    <th>Add as User</th>
                                </tr>
                                </thead>
                                <tbody>";

                if (self::$db->getNumRows($result_set)>0){
                    while($employee = mysqli_fetch_assoc($result_set)){

                        $employee_list.= "<tr>";
                        $employee_list.= "<td>{$employee['emp_id']}</td>";
                        $employee_list.= "<td>{$employee['first_name']}</td>";
                        $employee_list.= "<td>{$employee['last_name']}</td>";
                        $employee_list.= "<td>{$employee['emp_email']}</td>";
                        $employee_list.= "<td>{$employee['emp_phone']}</td>";
                        $employee_list.= "<td>{$employee['emp_address']}</td>";
                        $employee_list.= "<td>{$employee['emp_type']}</td>";
                        $employee_list.= "<td><a href=\"add-User.php?user_id={$employee['emp_id']}\" data-toggle=\"modal\" data-target=\"#myModal\" class=\"btn btn-success btn-sm\"><span class=\"glyphicon glyphicon-plus\"></span>  Add</a></td>";
                        $employee_list.= "</tr>";
                    }
                    $employee_list .= "</tbody>
                                    </table>";
                    echo $employee_list;
                }
                else{
                    echo "<p>No Search Results Found</p>";
                }
            }catch (Exception $e){
                echo $e;
            }
        }

        // search employee details
        public function searchEmployeeDetails($field,$search_text){
            // load all data on page ready
            if ($field=="*"){
                $query = "SELECT * FROM employee";
            }
            elseif ($field=="all"){
                $query = "SELECT * FROM employee WHERE emp_id LIKE '%".$search_text
                    ."%' OR first_name LIKE '%".$search_text
                    ."%' OR last_name LIKE '%".$search_text
                    ."%' OR emp_email LIKE '%".$search_text
                    ."%' OR emp_address LIKE '%".$search_text
                    ."%' OR emp_phone LIKE '%".$search_text
                    ."%' OR emp_type LIKE '%".$search_text
                    ."%' OR emp_gender LIKE '%".$search_text."%'";
            }
            else{
                $query = "SELECT * FROM employee WHERE ".$field." LIKE '%".$search_text."%'";
            }

            try{
                $result_set = self::$db->executeQuery($query);
                self::$db->verifyQuery($result_set);

                $employee_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Type</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Add as User</th>
                                </tr>
                                </thead>
                                <tbody>";

                if (self::$db->getNumRows($result_set)>0){
                    while($employee = mysqli_fetch_assoc($result_set)){

                        $employee_list.= "<tr>";
                        $employee_list.= "<td>{$employee['emp_id']}</td>";
                        $employee_list.= "<td>{$employee['first_name']}</td>";
                        $employee_list.= "<td>{$employee['last_name']}</td>";
                        $employee_list.= "<td>{$employee['emp_email']}</td>";
                        $employee_list.= "<td>{$employee['emp_phone']}</td>";
                        $employee_list.= "<td>{$employee['emp_address']}</td>";
                        $employee_list.= "<td>{$employee['emp_type']}</td>";
                        $employee_list.= "<td><a class=\"btn btn-success btn-sm edit_data\" name=\"edit\" value=\"Edit\" id=\"{$employee['emp_id']}\"><span class=\"glyphicon glyphicon-edit\"></span>  Edit</a></td>";
                        $employee_list.= "<td><a class=\"btn btn-danger btn-sm\" name=\"delete\" value=\"Delete\" id=\"{$employee['emp_id']}\"><span class=\"glyphicon glyphicon-trash\"></span>  Delete</a></td>";
                        if ($employee['is_user']==1){
                            $employee_list.= "<td><a class=\"btn btn-success btn-sm add_user disabled\" name=\"add\" value=\"Add\" id=\"{$employee['emp_id']}\"><span class=\"glyphicon glyphicon-plus\"></span>  Add</a></td>";
                        }
                        else{
                            $employee_list.= "<td><a class=\"btn btn-success btn-sm add_user\" name=\"add\" value=\"Add\" id=\"{$employee['emp_id']}\"><span class=\"glyphicon glyphicon-plus\"></span>  Add</a></td>";
                        }
                        $employee_list.= "</tr>";
                    }
                    $employee_list .= "</tbody>
                                    </table>";
                    echo $employee_list;
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