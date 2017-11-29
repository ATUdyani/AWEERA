<?php require_once('../model/Database.php') ?>
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
	}

 ?>