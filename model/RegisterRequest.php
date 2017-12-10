<?php require_once('../model/Database.php') ?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 09-Sep-17
 * Time: 7:59 PM
 */

class RegisterRequest
{
    //protected static $first_name;
    //protected static $last_name;
    //protected static $cust_phone;
    //protected static $cust_address;
    //protected static $cust_email;
    //protected static $password;

    protected static $db;
    protected static $connection;

    // default constructor
    function __construct(){
        self::$db = new Database();
        self::$connection = self::$db->connect();
    }


    // add new register request
    public function addRegisterRequest($rg_first_name,$rg_last_name,$rg_contact_number,$rg_address,$rg_email,$rg_gender,$hashed_password){

        // query to add new register request
        $query = "INSERT INTO register_request(first_name,last_name,cust_phone,cust_address,cust_email,cust_gender,password) VALUES ('$rg_first_name','$rg_last_name','$rg_contact_number','$rg_address','$rg_email','$rg_gender','$hashed_password')";

        try {
            $result = self::$db->executeQuery($query);
            return $result;
        } catch (Exception $e) {
            echo $e;
        }
    }

    // delete register request
    public function deleteRegisterRequest($cust_email){

        // query to delete the particular register request
        $query = "DELETE FROM register_request WHERE cust_email='".$cust_email."'";

        try{
            $result = self::$db->executeQuery($query);
            return $result;

        }
        catch(Exception $e){
            echo $e;
        }
    }

    // to view/search all new register requests
    public function searchRegisterRequests($field,$search_text){
        // load all data on page ready
        if ($field=="*"){
            $query = "SELECT * FROM register_request";
        }
        elseif ($field=="all"){
            $query = "SELECT * FROM register_request WHERE first_name LIKE '%".$search_text
                ."%' OR last_name LIKE '%".$search_text
                ."%' OR cust_phone LIKE '%".$search_text
                ."%' OR cust_address LIKE '%".$search_text
                ."%' OR cust_email LIKE '%".$search_text."%'";
        }
        else{
            $query = "SELECT * FROM register_request WHERE ".$field." LIKE '%".$search_text."%'";
        }

        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);

            $request_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Check Request</th>
                                </tr>
                                </thead>
                                <tbody>";

            if (self::$db->getNumRows($result_set)>0){
                while($user = mysqli_fetch_assoc($result_set)){

                    $request_list.= "<tr>";
                    $request_list.= "<td>{$user['first_name']}</td>";
                    $request_list.= "<td>{$user['last_name']}</td>";
                    $request_list.= "<td>{$user['cust_phone']}</td>";
                    $request_list.= "<td>{$user['cust_address']}</td>";
                    $request_list.= "<td>{$user['cust_email']}</td>";
                    $request_list.= "<td><a class=\"btn btn-primary btn-sm edit_data\" name=\"edit\" value=\"Edit\" id=\"{$user['reg_id']}\"><span class=\"glyphicon glyphicon-edit\"></span> Check</a></td>";
                    $request_list.= "</tr>";
                }
                $request_list .= "</tbody>
                                    </table>";
                echo $request_list;
            }
            else{
                echo "<p>No Search Results Found</p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }

    // get all register request data for a particular reg id
    function getRegisterRequestData($reg_id){
        $query = "SELECT * FROM register_request WHERE reg_id='".$reg_id."'";
        try{
            $result = self::$db->executeQuery($query);
            $row = mysqli_fetch_array($result);
            return $row;

        }
        catch(Exception $e){
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