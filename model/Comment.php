<?php require_once('Database.php') ?>
<?php
	
	class Comment{
        //protected static $comment;

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

            // checking whether this comment link is used earlier for commenting
            $query = "SELECT comment FROM appointment WHERE appointment_id='".$appointment_id."'";
            $result = self::$db->executeQuery($query);
            $row = mysqli_fetch_assoc($result);
            if ($row['comment']!=NULL){
                echo "<h4>Sorry, you cannot comment again for this appointment. You have already commented!</h4>";
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
                echo $e;
            }
        }

        // get latest comments to display on home page
        public function getComments(){

            // query to retrieve latest comments
            $query = "SELECT a.comment,s.service_name,c.first_name,c.last_name FROM appointment a,registered_customer c,service s WHERE a.cust_id=c.cust_id 
AND a.service_id=s.service_id AND a.comment IS NOT NULL AND is_approved=1 ORDER BY a.appointment_date DESC LIMIT 9";

            try{
                $result = self::$db->executeQuery($query);
                return $result;
            }
            catch(Exception $e){
                echo $e;
            }
        }

        // get pending comment count
        public function countComment(){
            // query to get the comment count
            $query = "SELECT COUNT(*) FROM appointment WHERE comment IS NOT NULL AND is_approved=-1";

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

        // get pending comments
        public function loadNewComments(){

            // query to retrieve unapproved comments
            $query = "SELECT a.appointment_id, e.emp_id, s.service_id, c.cust_id, c.first_name AS cust_first_name, c.last_name AS cust_last_name,
e.first_name AS emp_first_name, e.last_name AS emp_last_name, service_name, comment 
FROM appointment a,registered_customer c,service s,employee e WHERE a.cust_id=c.cust_id 
AND a.service_id=s.service_id AND a.emp_id=e.emp_id AND a.comment IS NOT NULL AND a.is_approved=-1";

            try{
                $result_set = self::$db->executeQuery($query);
                self::$db->verifyQuery($result_set);

                $comment_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>Customer</th>
                                    <th>Beautician</th>
                                    <th>Service</th>
                                    <th>Comment</th>
                                    <th>Check Comment</th>
                                </tr>
                                </thead>
                                <tbody>";

                if (self::$db->getNumRows($result_set)>0){
                    while($comment = mysqli_fetch_array($result_set)){

                        $comment_list.= "<tr>";
                        $comment_list.= "<td>{$comment['appointment_id']}</td>";
                        $comment_list.= "<td><a class='customer_check' id={$comment['cust_id']}>{$comment['cust_first_name']} {$comment['cust_last_name']}</a></td>";
                        $comment_list.= "<td><a class='emp_check' id={$comment['emp_id']}>{$comment['emp_first_name']} {$comment['emp_last_name']}</a></td>";
                        $comment_list.= "<td><a class='service_check' id={$comment['service_id']}>{$comment['service_name']}</a></td>";
                        $comment_list.= "<td>{$comment['comment']}</td>";
                        $comment_list.= "<td><a class=\"btn btn-primary btn-sm edit_data\" name=\"edit\" value=\"Edit\" id=\"{$comment['appointment_id']}\"><span class=\"glyphicon glyphicon-edit\"></span> Check</a></td>";
                        $comment_list.= "</tr>";
                    }
                    $comment_list .= "</tbody>
                                    </table>";
                    echo $comment_list;
                }
                else{
                    echo "<p><i>No new comments</i></p>";
                }
            }catch (Exception $e){
                echo $e;
            }
        }

        // approve or disapprove a comment to be published on the website
        public function updateCommentStatus($appointment_id,$status){
            // query to update status of the comment
            $query = "UPDATE appointment SET is_approved='".$status."' WHERE appointment_id='".$appointment_id."'";

            try{
                $result = self::$db->executeQuery($query);
                if ($result){
                    if ($status=='1'){
                        echo "<h4>Comment is Approved</h4>";
                    }
                    else{
                        echo "<h4>Comment is Disapproved</h4>";
                    }
                }
                else{
                    echo "<h4>Failed to Update!</h4>";
                }
            }
            catch(Exception $ex){
                echo $ex;
            }
        }
	}



 ?>