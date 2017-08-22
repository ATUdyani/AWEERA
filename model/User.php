<?php require_once('../model/Database.php') ?>
<?php 
	class User{

        protected static $emp_id;
        protected static $first_name;
        protected static $last_name;
        protected static $emp_email;
        protected static $emp_type;
        protected static $last_login;
        protected static $password;

        protected static $db;
        protected static $connection;

        // default constructor
        function __construct(){
            self::$db = new Database();
            self::$connection = self::$db->connect();
        }

        // load user details to a page
        public function loadUsers(){
		    $user_list ='';
			//getting list of users
			$query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY type";
			$users = self::$db->executeQuery($query);

			self::$db->verifyQuery($users);

			while($user = mysqli_fetch_assoc($users)){
				$user_list.= "<tr>";
				$user_list.= "<td>{$user['id']}</td>";
				$user_list.= "<td>{$user['first_name']}</td>";
				$user_list.= "<td>{$user['last_name']}</td>";
				$user_list.= "<td>{$user['type']}</td>";
				$user_list.= "<td>{$user['last_login']}</td>";
				$user_list.= "<td><a href=\"modify-User.php?user_id={$user['id']}\">Edit</a></td>";
				$user_list.= "<td><a href=\"delete-User.php?user_id={$user['id']}\">Delete</a></td>";
				$user_list.= "</tr>";
			}
			return $user_list;		
		}

		public function addEmployeeUser($first_name,$last_name,$emp_email,$emp_type,$emp_password,$emp_id){
            $hashed_password = md5($emp_password);
            $query = "INSERT INTO user (first_name, last_name, email, password, type) VALUES ('".$first_name."', '".$last_name."', '".$emp_email."', '"
                .$hashed_password."', '".$emp_type."')";


            try{
                $result = self::$db->executeQuery($query);
                if ($result){
                    $query = "UPDATE employee SET is_user = 1 WHERE emp_id ='$emp_id'";
                    $result_next = self::$db->executeQuery($query);
                    if ($result){
                        echo "<h4>User successfully added.</h4>";
                    }
                }
                else{
                    echo "<h4>Failed to add the new user.</h4>";
                }
            }catch (mysqli_sql_exception $e){
                echo $e;
            }
        }

	}
	
 ?>