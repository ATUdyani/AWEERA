<?php require_once('Database.php') ?>
<?php
	
	class Comment{
        protected static $comment;

        protected static $db;
        protected static $connection;

        public function __construct(){
            self::$db = new Database();
            self::$connection = self::$db->connect();
        }

        // submit a comment by a customer
		public function submitComment($appointment_id,$comment){

            // check whether the comment is blank
            if ($comment==""){
                echo "Please Check! You cannot submit blank comments.";
                return;
            }

            // query to insert a new comment to the particular appointment
            $query = "UPDATE appointment SET comment='".$comment."' WHERE appointment_id='".$appointment_id."'";
            try{
                $result = self::$db->executeQuery($query);
                if ($result){
                    echo "<h4>Thank you! Your comment is recorded successfully.</h4>";
                }
                else{
                    echo "<h4>Failed to add your comment!</h4>";
                }

            }
            catch(Exception $e){
                echo e;
            }
        }

        // get latest comments to display on home page
        public function getComments(){

            // query to retrieve latest comments
            $query = "SELECT a.comment,s.service_name,c.first_name,c.last_name FROM appointment a,registered_customer c,service s WHERE a.cust_id=c.cust_id 
AND a.service_id=s.service_id AND a.comment IS NOT NULL ORDER BY a.appointment_date DESC LIMIT 9";

            try{
                $result = self::$db->executeQuery($query);
                return $result;
            }
            catch(Exception $e){
                echo $e;
            }
        }
	}

 ?>