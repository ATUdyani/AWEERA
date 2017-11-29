<?php require_once('../model/Employee.php') ?>
<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 04-Sep-17
 * Time: 5:06 PM
 */

class Beautician extends Employee
{
    protected static $emp_services =[];


    // add Beautician service list to the database
    public function addBeauticianServices($emp_services){
        self::$emp_services = $emp_services;

        $last_id=self::$db->getLastRecordId('emp_id','employee');

        foreach ( self::$emp_services as $service) {
            $query = "INSERT INTO beautician_service (emp_id, service_id) VALUES ('".$last_id."', '"
                .$service."')";

            try{
                $result = self::$db->executeQuery($query);
                if (!$result){
                    echo "<h4>Failed to add the new record to the beautician_service table.</h4>";
                }
            }catch (mysqli_sql_exception $e){
                echo $e;
            }
        }
    }

    // fetch suitable Beautician names for a particular service id
    public function fetchBeauticianNames($service_id){
        // if all beauticians have to be loaded for all services
        if($service_id=="*"){
            $query="SELECT * FROM employee WHERE emp_type='Beautician'";
        }
        else{
            $query="SELECT * FROM beautician_service b,employee e WHERE b.service_id='$service_id' AND b.emp_id=e.emp_id";
        }
        $beautician_names ='';

        $beautician_names.="<option value=\"\">Select a Beautician</option>";

        try{
            $services = self::$db->executeQuery($query);
            self::$db->verifyQuery($services);
            while($beautician = mysqli_fetch_assoc($services)){
                $beautician_names .= "<option value=\"{$beautician['emp_id']}\">{$beautician['first_name']}</option>";
            }
            return $beautician_names;

        }catch (Exception $e){
            echo $e;
        }
    }

}