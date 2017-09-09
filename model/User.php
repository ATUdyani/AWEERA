<?php require_once('../model/Database.php') ?>
<?php 
	class User{

        protected static $id;
        protected static $first_name;
        protected static $last_name;
        protected static $email;
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
				$user_list.= "<td>{$user['first_name']}</td>";
				$user_list.= "<td>{$user['last_name']}</td>";
				$user_list.= "<td>{$user['email']}</td>";
				$user_list.= "<td>{$user['type']}</td>";
				$user_list.= "<td>{$user['last_login']}</td>";
                $user_list.= "<td><a class=\"btn btn-success btn-sm edit_data\" name=\"edit\" value=\"Edit\" id=\"{user['id']}\"><span class=\"glyphicon glyphicon-edit\"></span>  Change Password</a></td>";
                $user_list.= "<td><a class=\"btn btn-danger btn-sm\" name=\"delete\" value=\"Delete\" id=\"{$user['id']}\"><span class=\"glyphicon glyphicon-trash\"></span>  Delete</a></td>";
				$user_list.= "</tr>";
			}
			return $user_list;		
		}

		// add an employee as a user
		public function addEmployeeUser($first_name,$last_name,$email,$emp_type,$emp_password,$id){
            $hashed_password = md5($emp_password);
            $query = "INSERT INTO user (first_name, last_name, email, password, type) VALUES ('".$first_name."', '".$last_name."', '".$email."', '"
                .$hashed_password."', '".$emp_type."')";


            try{
                $result = self::$db->executeQuery($query);
                if ($result){
                    $query = "UPDATE employee SET is_user = 1 WHERE emp_id ='$id'";
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

        // search user details
        public function searchUserDetails($field,$search_text){
            // load all data on page ready
            if ($field=="*"){
                $query = "SELECT * FROM user ORDER BY type";
            }
            elseif ($field=="all"){
                $query = "SELECT * FROM user WHERE first_name LIKE '%".$search_text
                    ."%' OR last_name LIKE '%".$search_text
                    ."%' OR email LIKE '%".$search_text
                    ."%' OR last_login LIKE '%".$search_text
                    ."%' OR type LIKE '%".$search_text."%'";
            }
            else{
                $query = "SELECT * FROM user WHERE ".$field." LIKE '%".$search_text."%'";
            }

            try{
                $result_set = self::$db->executeQuery($query);
                self::$db->verifyQuery($result_set);

                $user_list ="<table class=\"table table-hover\">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Last Login</th>
                                    <th>Type</th>
                                    <th>Change Password</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>";

                if (self::$db->getNumRows($result_set)>0){
                    while($user = mysqli_fetch_assoc($result_set)){

                        $user_list.= "<tr>";
                        $user_list.= "<td>{$user['first_name']}</td>";
                        $user_list.= "<td>{$user['last_name']}</td>";
                        $user_list.= "<td>{$user['email']}</td>";
                        $user_list.= "<td>{$user['last_login']}</td>";
                        $user_list.= "<td>{$user['type']}</td>";
                        $user_list.= "<td><a class=\"btn btn-success btn-sm change_password\" name=\"change_password\" value=\"change_password\" id=\"{$user['id']}\"><span class=\"glyphicon glyphicon-plus change_password\"></span>  Change Password</a></td>";
                        $user_list.= "<td><a class=\"btn btn-danger btn-sm delete_user\" name=\"delete_user\" value=\"delete_user\" id=\"{$user['id']}\"><span class=\"glyphicon glyphicon-trash delete_user\"></span>  Delete</a></td>";
                        $user_list.= "</tr>";
                    }
                    $user_list .= "</tbody>
                                    </table>";
                    echo $user_list;
                }
                else{
                    echo "<p>No Search Results Found</p>";
                }
            }catch (Exception $e){
                echo $e;
            }
        }

        // get all user data for a particular user id
        public function getUserData($user_id){
            $query = "SELECT * FROM user WHERE id='".$user_id."'";
            try{
                $result = self::$db->executeQuery($query);
                $row = mysqli_fetch_array($result);
                return $row;

            }
            catch(Exception $e){
                echo e;
            }
        }

        // change user password
        public function changeUserPassword($emp_password,$user_id)
        {
            $hashed_password = md5($emp_password);
            $query = "UPDATE user SET password='$hashed_password' WHERE id ='$user_id'";


            try {
                $result = self::$db->executeQuery($query);
                if ($result) {
                    echo "<h4>Password Changed Successfully.</h4>";
                } else {
                    echo "<h4>Failed to Change the Password.</h4>";
                }
            } catch (mysqli_sql_exception $e) {
                echo $e;
            }
        }

        // count number of new register requests
        public function countRequest(){
            $query = "SELECT COUNT(*) FROM register_request";


            try {
                $result = self::$db->executeQuery($query);

                if ($result) {
                    $req = mysqli_fetch_assoc($result);
                    echo $req['COUNT(*)'];
                } else {
                    echo 0;
                }
            } catch (mysqli_sql_exception $e) {
                echo $e;
            }
        }


	}

	
 ?>