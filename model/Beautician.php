<?php require_once('Employee.php') ?>
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
            $query="SELECT * FROM employee WHERE emp_type='Beautician' AND is_deleted='0'";
        }
        else{
            $query="SELECT * FROM beautician_service b,employee e WHERE b.service_id='$service_id' AND b.emp_id=e.emp_id AND e.is_deleted='0'";
        }
        $beautician_names ='';

        $beautician_names.="<option value=\"*\">Select a Beautician</option>";

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

    // view appointments for a particular date
    public function viewAppointments($emp_id,$date){
        $query ="SELECT * FROM appointment a,registered_customer c,service s WHERE a.emp_id='".$emp_id."' 
        AND a.appointment_date='".$date."' AND a.service_id=s.service_id AND a.cust_id=c.cust_id ORDER BY start_time";
        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);

            $appointment_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Customer</th>
                                    <th>Service</th>
                                </tr>
                                </thead>
                                <tbody>";

            if (self::$db->getNumRows($result_set)>0){
                while($appointment = mysqli_fetch_array($result_set)){

                    $appointment_list.= "<tr>";
                    $appointment_list.= "<td>{$appointment['appointment_id']}</td>";
                    $appointment_list.= "<td>{$appointment['start_time']}h</td>";
                    $appointment_list.= "<td>{$appointment['end_time']}h</td>";
                    $appointment_list.= "<td>{$appointment['first_name']} {$appointment['last_name']}</td>";
                    $appointment_list.= "<td>{$appointment['service_name']}</td>";
                }
                $appointment_list .= "</tbody>
                                    </table>";
                echo $appointment_list;
            }
            else{
                echo "<p><i>No Search Results Found</i></p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }


    // load upcoming appointments for a particular beautician
    public function loadUpcomingAppointments($emp_id){
        // query to retrieve upcoming appointments
        $query = "SELECT * FROM appointment a,registered_customer c,service s WHERE a.emp_id='".$emp_id."'
             AND a.cust_id=c.cust_id AND a.service_id=s.service_id AND appointment_date>'".date("Y-m-d")."'";

        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);

            $appointment_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Customer</th>
                                    <th>Service</th>
                                </tr>
                                </thead>
                                <tbody>";

            if (self::$db->getNumRows($result_set)>0){
                while($appointment = mysqli_fetch_array($result_set)){

                    $appointment_list.= "<tr>";
                    $appointment_list.= "<td>{$appointment['appointment_id']}</td>";
                    $appointment_list.= "<td>{$appointment['appointment_date']}</td>";
                    $appointment_list.= "<td>{$appointment['start_time']}h</td>";
                    $appointment_list.= "<td>{$appointment['end_time']}h</td>";
                    $appointment_list.= "<td>{$appointment['first_name']} {$appointment['last_name']}</td>";
                    $appointment_list.= "<td>{$appointment['service_name']}</td>";
                }
                $appointment_list .= "</tbody>
                                    </table>";
                echo $appointment_list;
            }
            else{
                echo "<p>No Upcoming Appointments</p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }


    // load appointment history for a particular beautician
    public function loadAppointmentHistory($emp_id){
        // query to retrieve appointment history
        $query = "SELECT * FROM appointment a,registered_customer c,service s WHERE a.emp_id='".$emp_id."'
             AND a.cust_id=c.cust_id AND a.service_id=s.service_id AND appointment_date<'".date("Y-m-d")."'
             ORDER BY appointment_date DESC LIMIT 50";

        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);

            $appointment_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Customer</th>
                                    <th>Service</th>
                                </tr>
                                </thead>
                                <tbody>";

            if (self::$db->getNumRows($result_set)>0){
                while($appointment = mysqli_fetch_array($result_set)){

                    $appointment_list.= "<tr>";
                    $appointment_list.= "<td>{$appointment['appointment_id']}</td>";
                    $appointment_list.= "<td>{$appointment['appointment_date']}</td>";
                    $appointment_list.= "<td>{$appointment['start_time']}h</td>";
                    $appointment_list.= "<td>{$appointment['end_time']}h</td>";
                    $appointment_list.= "<td>{$appointment['first_name']} {$appointment['last_name']}</td>";
                    $appointment_list.= "<td>{$appointment['service_name']}</td>";
                }
                $appointment_list .= "</tbody>
                                    </table>";
                echo $appointment_list;
            }
            else{
                echo "<p>No Upcoming Appointments</p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }
}

?>