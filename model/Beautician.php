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
                    echo "Failed to add the new record to the beautician_service table.";
                }
            }catch (mysqli_sql_exception $e){
                echo $e;
            }
        }
    }

    // fetch suitable Beautician names to appointment page for a particular service id
    public function fetchBeauticianNames($service_id){
        $beautician_names ='';

        $query="SELECT * FROM beautician_service b,employee e WHERE b.service_id='$service_id' AND b.emp_id=e.emp_id";

        $beautician_names.="<select name=\"select_beautician_name\" id=\"select_beautician_name\" class=\"form-control\"> <option value=\"\">Select a Beautician</option>";

        try{
            $services = self::$db->executeQuery($query);
            self::$db->verifyQuery($services);
            while($beautician = mysqli_fetch_assoc($services)){
                $beautician_names .= "<option value=\"{$beautician['emp_id']}\">{$beautician['first_name']}</option>";
            }
            $beautician_names.="</select>";
            return $beautician_names;

        }catch (Exception $e){
            echo $e;
        }
    }
}