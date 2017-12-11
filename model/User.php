<?php require_once('../model/Database.php') ?>
<?php require_once('../model/RegisteredCustomer.php') ?>
<?php require_once('../model/Employee.php') ?>
<?php
	class User{

        //protected static $id;
        //protected static $first_name;
        //protected static $last_name;
        //protected static $email;
        //protected static $emp_type;
        //protected static $last_login;
        //protected static $password;

        protected static $db;
        protected static $connection;

        // default constructor
        function __construct(){
            self::$db = new Database();
            self::$connection = self::$db->connect();
        }

        // add a new user - $new_id is the user_reg_id which can be used to link with other tables
        public function addCustomerUser($first_name, $last_name, $cust_email, $password, $new_id){

            // insert the new record to user table
            $query = "INSERT INTO user (first_name, last_name, email, password, type, user_reg_id) VALUES ('".$first_name."', '".$last_name."', '".$cust_email."', '"
                .$password."', 'Customer','".$new_id."')";

            try{
                $result = self::$db->executeQuery($query);
                return $result;

            }catch (mysqli_sql_exception $e){
                return $e;
            }
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
            $query = "INSERT INTO user (first_name, last_name, email, password, type, user_reg_id) VALUES ('".$first_name."', '".$last_name."', '".$email."', '"
                .$hashed_password."', '".$emp_type."', '".$id."')";


            try{
                $result = self::$db->executeQuery($query);
                if ($result){
                    $employee = new Employee();
                    $result_employee = $employee -> changeUserStatus($id,'1');
                    if ($result AND $result_employee){
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

                $user_list ="<table class=\"table table-hover col-md-12\">
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
                        $user_list.= "<td><a class=\"btn btn-success btn-sm change_password\" name=\"change_password\" value=\"change_password\" id=\"{$user['user_reg_id']}\"><span class=\"glyphicon glyphicon-plus change_password\"></span>  Change Password</a></td>";
                        $user_list.= "<td><a class=\"btn btn-danger btn-sm delete_user\" name=\"delete_user\" value=\"delete_user\" id=\"{$user['user_reg_id']}\"><span class=\"glyphicon glyphicon-trash delete_user\"></span>  Delete</a></td>";
                        $user_list.= "</tr>";
                    }
                    $user_list .= "</tbody>
                                    </table>";
                    echo $user_list;
                }
                else{
                    echo "<p><i>No Search Results Found</i></p>";
                }
            }catch (Exception $e){
                echo $e;
            }
        }

        // get all user data for a particular user id
        public function getUserData($user_id){
            $query = "SELECT * FROM user WHERE id='".$user_id."' OR user_reg_id='".$user_id."'";
            try{
                $result = self::$db->executeQuery($query);
                $row = mysqli_fetch_array($result);
                return $row;

            }
            catch(Exception $e){
                echo $e;
            }
        }

        // change user password
        public function changeUserPassword($password,$user_id)
        {
            $hashed_password = md5($password);
            $query = "UPDATE user SET password='$hashed_password' WHERE user_reg_id ='$user_id'";


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

        // update user details
        public function updateUser($id,$first_name,$last_name,$email){

            $query = "UPDATE user SET first_name='".$first_name
                ."', last_name = '".$last_name."',email = '".$email."' WHERE user_reg_id='".$id."'";

            try{
                $result= self::$db->executeQuery($query);
                return $result;

            }catch (Exception $e){
                echo $e;
            }
        }

        // update the profile picture
        public function updateUserProfilePicture($id,$type,$file_name){

            $query = "UPDATE user SET profile_pic='".$file_name."' WHERE user_reg_id='".$id."'";

            try{
                $result1= self::$db->executeQuery($query);
                if ($type=='Customer'){

                    $customer = new RegisteredCustomer();
                    $result2 = $customer->updateCustomerProfilePicture($id,$file_name);

                }
                else{
                    $employee = new Employee();
                    $result2 = $employee->updateEmployeeProfilePicture($id,$file_name);
                }

                if ($result1 AND $result2){
                    return $result1;
                }
                else{
                    return 0;
                }
            }catch (Exception $e){
                echo $e;
            }
        }

        // delete an user record
        public function deleteUser($record_id){
            $user = $this -> getUserData($record_id);

            // get user type and check
            $type = $user['type'];
            if ($type!='Customer'){
                $employee = new Employee();
                $result = $employee -> changeUserStatus($record_id,'0');
            }
            else{
                $result =1; // true by default (for customer deletion)
            }

            $query = "DELETE FROM user WHERE user_reg_id='".$record_id."'";

            try{
                $result_user= self::$db->executeQuery($query);
                return $result AND $result_user;
            }catch (Exception $e){
                return $e;
            }
        }
	}

	
 ?>