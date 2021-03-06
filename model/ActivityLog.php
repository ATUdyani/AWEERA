<?php require_once('Database.php') ?>
<?php

class ActivityLog{
    // protected static $id;
    protected static $date_time;
    protected static $user_reg_id;
    protected static $user_type;
    protected static $modified_id;
    protected static $description;

    protected static $db;
    protected static $connection;

    public function __construct(){

        self::$db = new Database();
        self::$connection = self::$db->connect();
        date_default_timezone_set('Asia/Colombo');
    }

    // get all activity data
    public function getActivityLogData($id){
        $query = "SELECT * FROM activity_log WHERE id='".$id."'";
        try{
            $result = self::$db->executeQuery($query);
            $row = mysqli_fetch_array($result);
            return $row;

        }
        catch(Exception $e){
            echo $e;
        }
    }

    // add new activity when session already started
    public function addActivityLog($modified_id,$description){
        $last_id=self::$db->getLastId('id','activity_log');

        $id = self::$db->generateId($last_id,"ACT");
        $date_time = date("Y-m-d H:i:s");

        $query = "INSERT INTO activity_log (id,date_time,user_reg_id,user_type,modified_id,description) VALUES ('"
            .$id."','".$date_time."', '".$_SESSION['user_reg_id']."', '"
            .$_SESSION['type']."', '".$modified_id."', '".$description."')";

        //echo $query;

        try{
            $result = self::$db->executeQuery($query);

            if ($result){
                //echo "<h4>activity successfully added.</h4>";
            }
            else{
                //echo "<h4>Failed to add the activity.</h4>";
            }
        }catch (mysqli_sql_exception $e){
            echo $e;
        }
    }

    // add new activity when session already started
    public function addActivityLogSession($modified_id,$description){
        session_start();
        $last_id=self::$db->getLastId('id','activity_log');

        $id = self::$db->generateId($last_id,"ACT");
        $date_time = date("Y-m-d H:i:s");

        //echo $_SESSION['user_reg_id'];
        //echo $_SESSION['type'];

        $query = "INSERT INTO activity_log (id,date_time,user_reg_id,user_type,modified_id,description) VALUES ('"
            .$id."','".$date_time."', '".$_SESSION['user_reg_id']."', '"
            .$_SESSION['type']."', '".$modified_id."', '".$description."')";

        //echo $query;

        try{
            $result = self::$db->executeQuery($query);

            if ($result){
                //echo "<h4>activity successfully added.</h4>";
            }
            else{
                //echo "<h4>Failed to add the activity.</h4>";
            }
        }catch (mysqli_sql_exception $e){
            echo $e;
        }
    }


    // view activity_log details
    public function viewActivityLogDetails($field,$search_text){
        // load all data on page ready
        if ($field=="*"){
            $query = "SELECT * FROM activity_log  ORDER BY date_time DESC";
        }
        elseif ($field=="all"){
            $query = "SELECT * FROM activity_log WHERE (id LIKE '%".$search_text
                ."%' OR date_time LIKE '%".$search_text
                ."%' OR user_reg_id LIKE '%".$search_text
                ."%' OR modified_id LIKE '%".$search_text
                ."%' OR description LIKE '%".$search_text."%') ORDER BY date_time DESC";
        }
        else{
            $query = "SELECT * FROM activity_log WHERE ".$field." LIKE '%".$search_text."%'  ORDER BY date_time DESC";
        }

        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);

            $activity_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>Date/Time</th>
                                    <th>User</th>
                                    <th>Modified Details</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>";

            if (self::$db->getNumRows($result_set)>0){
                while($activity_log = mysqli_fetch_assoc($result_set)){

                    $activity_list.= "<tr>";
                    $activity_list.= "<td>{$activity_log['date_time']}</td>";
                    $activity_list.= "<td>{$activity_log['user_reg_id']}</td>";
                    $activity_list.= "<td>{$activity_log['modified_id']}</td>";
                    $activity_list.= "<td>{$activity_log['description']}</td>";
                    $activity_list.= "</tr>";
                }
                $activity_list .= "</tbody>
                                    </table>";
                echo $activity_list;
            }
            else{
                echo "<p><i>No Search Results Found</i></p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }





}

?>