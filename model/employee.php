<?php require_once('../model/database.php') ?>

<?php  
	
	class Employee{

		protected static $first_name;
		protected static $last_name; 
		protected static $emp_email; 
		protected static $emp_phone;
		protected static $emp_address;
        protected static $emp_type;
		protected static $db;
		protected static $connection;

        public function __construct(){
            self::$db = new Database();
            self::$connection = self::$db->connect();
        }

        public function setEmployee($first_name,$last_name,$emp_email,$emp_phone,$emp_address,$emp_type){
            self::$db = new Database();
            self::$connection = self::$db->connect();

            self::$first_name = $first_name;
            self::$last_name = $last_name;
            self::$emp_email = $emp_email;
            self::$emp_phone = $emp_phone;
            self::$emp_address = $emp_address;
            self::$emp_type = $emp_type;

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

		function addEmployee(){
		    $last_id=self::$db->getLastId('emp_id','employee');

		    $id = self::$db->generateId($last_id,"EMP");

		    echo $id;

			$query = "INSERT INTO employee (emp_id, first_name, last_name, emp_email, emp_phone, emp_address, emp_type) VALUES ('".
            $id."', '".self::$first_name."', '".self::$last_name."', '".self::$emp_email."', '".self::$emp_phone."', '".self::$emp_address."', '".self::$emp_type."')";

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

        public function loadEmployeeDetails(){
            $employee_list ='';

            //getting list of employee items
            $query = "SELECT * FROM employee ORDER BY emp_type";

            try{
                $suppliers = self::$db->executeQuery($query);
                self::$db->verifyQuery($suppliers);

                while($employee = mysqli_fetch_assoc($suppliers)){
                    $employee_list.= "<tr>";
                    $employee_list.= "<td>{$employee['emp_id']}</td>";
                    $employee_list.= "<td>{$employee['first_name']}</td>";
                    $employee_list.= "<td>{$employee['last_name']}</td>";
                    $employee_list.= "<td>{$employee['emp_email']}</td>";
                    $employee_list.= "<td>{$employee['emp_phone']}</td>";
                    $employee_list.= "<td>{$employee['emp_address']}</td>";
                    $employee_list.= "<td>{$employee['emp_type']}</td>";
                    $employee_list.= "<td><a href=\"modify-user.php?user_id={$employee['emp_id']}\">Edit</a></td>";
                    $employee_list.= "<td><a href=\"delete-user.php?user_id={$employee['emp_id']}\">Delete</a></td>";
                    $employee_list.= "</tr>";
                }
                return $employee_list;

            }catch (Exception $e){
                echo $e;
            }
        }

	}


 ?>