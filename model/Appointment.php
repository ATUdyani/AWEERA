<?php require_once('../model/Database.php') ?>
<?php require_once('../model/Service.php') ?>

<?php  

	class Appointment
    {

        protected static $appointment_id;
        protected static $appointment_date;
        protected static $start_time;
        protected static $end_time;
        protected static $payment_id;
        protected static $cust_id;
        protected static $service_id;
        protected static $emp_id;
        protected static $db;
        protected static $connection;
        protected static $OPEN_TIME = "9"; // opening time of the salon 0900
        protected static $CLOSE_TIME = "19"; // closing time of the salon 1900
        protected static $MIN_DURATION = 30; // minimum time for a service in minutes

        public function __construct()
        {
            self::$db = new Database();
            self::$connection = self::$db->connect();
        }

        // get free time slots for a particular beautician for a particular date
        public function getFreeSlots($beautician_id, $date, $service_id)
        {
            $query = "SELECT * FROM appointment WHERE emp_id=" . "'$beautician_id'" . " AND appointment_date=" . "'$date' ORDER BY start_time ASC";

            try {
                $result = self::$db->executeQuery($query);

                self::$db->verifyQuery($result);

                $free_slots = "";
                $service = new Service();
                $duration = $service->fetchServiceDuration($service_id);

                // no appointments for a particular beautician for a particular day
                if (self::$db->getNumRows($result) == 0) {
                    $free_slots = $this->originalTimeSlots();
                    return $free_slots;
                }
                else {

                    $result_set = $this->chooseTimeSlots($result,$duration);
                    //$free_slots.="<option value=\"\">".$result_set."</option>";
                    foreach ($result_set as $value) {
                        $free_slots.="<option value=\"{$value}\">".$value."</option>";
                    }
                    return $free_slots;
                }
            } catch (Exception $e) {
                echo $e;
            }
        }

        // load original time slots for a particular day
        public function originalTimeSlots()
        {
            $slots = "";
            $slots .= "<option value=\"0900\">0900h</option>";
            $slots .= "<option value=\"0930\">0930h</option>";
            $slots .= "<option value=\"1000\">1000h</option>";
            $slots .= "<option value=\"1030\">1030h</option>";
            $slots .= "<option value=\"1100\">1100h</option>";
            $slots .= "<option value=\"1130\">1130h</option>";
            $slots .= "<option value=\"1200\">1200h</option>";
            $slots .= "<option value=\"1230\">1230h</option>";
            $slots .= "<option value=\"1300\">1300h</option>";
            $slots .= "<option value=\"1330\">1330h</option>";
            $slots .= "<option value=\"1400\">1400h</option>";
            $slots .= "<option value=\"1430\">1430h</option>";
            $slots .= "<option value=\"1500\">1500h</option>";
            $slots .= "<option value=\"1530\">1530h</option>";
            $slots .= "<option value=\"1600\">1600h</option>";
            $slots .= "<option value=\"1630\">1630h</option>";
            $slots .= "<option value=\"1700\">1700h</option>";
            $slots .= "<option value=\"1730\">1730h</option>";
            $slots .= "<option value=\"1800\">1800h</option>";

            return $slots;
        }

        // make an appointment
        public function makeAppointment($service_id,$emp_id,$appointment_date,$appointment_time,$duration){
            session_start();
            $start_time = $appointment_time;
            $end_time = $this->getEndTime($start_time,$duration);
            $cust_id = $_SESSION['user_reg_id'];

            $last_id=self::$db->getLastId('appointment_id','appointment');

            $new_id = self::$db->generateId($last_id,"APP");


            $query = "INSERT INTO appointment(appointment_id, appointment_date, start_time, end_time, payment_id, cust_id, service_id, emp_id) VALUES ('".
                $new_id."', '".$appointment_date."', '".$start_time."', '".$end_time."', 'none', '".$cust_id."', '".$service_id."', '".$emp_id."')";


            try{
                $result = self::$db->executeQuery($query);
                if ($result){
                    echo "<h4>Appointment Successful!</h4><br>";
                    echo "<h4>Thank You!"." ".$_SESSION['first_name']." ".$_SESSION['last_name'].".</h4>";
                    echo "<h4>Have a great day!</h4><br>";

                }
                else{
                    echo "<h4>Sorry! Failed to make the Appointment.</h4>";
                    echo "<h4>Please contact <i>AWEERA.</i></h4>";
                }
            }catch (mysqli_sql_exception $e){
                echo "<h4>".$e."</h4>";
            }
        }

        // returns appointment end_time based on the start_time and the duration
        public function getEndTime($start_time,$duration){
            $start_time_minutes = substr($start_time,2,2);
            $start_time_hour = substr($start_time,0,2);

            $minutes = $start_time_minutes + $duration;
            $hours = $start_time_hour;
            if ($minutes>=60){
                $hours+=1;
                $minutes-=60;
            }
            if (strlen($minutes)!=2){
                $minutes = $minutes."0";
            }
            if (strlen($hours)!=2){
                $hours = "0".$minutes;
            }
            return $hours."".$minutes;
        }

        // divide slots from opening time to the given time
        public function divideSlotsFromOpen($time,$duration){
            $slots = array();
            $time_minutes = substr($time,2,2);
            $time_hour = substr($time,0,2);

            $gap_hour = ($time_hour-self::$OPEN_TIME);
            $gap_minutes = $gap_hour*60+$time_minutes-self::$MIN_DURATION; // first 30 minutes of the day won't be allocated for appointments
            $begin_time_hour = self::$OPEN_TIME;
            $begin_time_minutes = "00";

            if ($gap_minutes>=$duration){
                while($gap_minutes>=$duration){
                    $begin_time_minutes += self::$MIN_DURATION;
                    if ($begin_time_minutes>=60){
                        $begin_time_hour+=1;
                        $begin_time_minutes-=60;
                    }
                    if(strlen($begin_time_hour)!=2){
                        $begin_time_hour="0".$begin_time_hour;
                    }
                    if(strlen($begin_time_minutes)!=2){
                        $begin_time_minutes="0".$begin_time_minutes;
                    }
                    $slots[] = $begin_time_hour."".$begin_time_minutes."h";
                    $gap_minutes-=self::$MIN_DURATION;
                }
            }
            return $slots;
        }


        // divide slots from the given time to the closing time
        public function divideSlotsToClose($time,$duration){
            $slots = array();
            $time_minutes = substr($time,2,2);
            $time_hour = substr($time,0,2);

            if ($time_minutes>0){
                $gap_hour = (self::$CLOSE_TIME-$time_hour)-1;
                $gap_minutes = 60-$time_minutes;
            }
            else{
                $gap_hour = (self::$CLOSE_TIME-$time_hour);
                $gap_minutes=0;
            }

            $gap_minutes = $gap_minutes + $gap_hour*60+$time_minutes-60; // last 60 minutes of the day won't be allocated for appointments
            $begin_time_hour = $time_hour; // slot allocation starting from the given time_hour
            $begin_time_minutes = $time_minutes; // slot allocation starting from the given time_minutes

            if ($gap_minutes>=$duration){
                while($gap_minutes>=$duration){

                    if ($begin_time_minutes>=60){
                        $begin_time_hour+=1;
                        $begin_time_minutes-=60;
                    }
                    if(strlen($begin_time_hour)!=2){
                        $begin_time_hour="0".$begin_time_hour;
                    }
                    if(strlen($begin_time_minutes)!=2){
                        $begin_time_minutes="0".$begin_time_minutes;
                    }
                    $slots[] = $begin_time_hour."".$begin_time_minutes."h";
                    $begin_time_minutes += self::$MIN_DURATION;
                    $gap_minutes-=self::$MIN_DURATION;
                }
            }
            return $slots;
        }

        // divide slots in a particular range
        public function divideSlotsInRange($start_time,$duration,$end_tme){
            $slots = array();

            $start_time_minutes = substr($start_time,2,2);
            $start_time_hour = substr($start_time,0,2);

            $end_time_minutes = substr($end_tme,2,2);
            $end_time_hour = substr($end_tme,0,2);

            if ($start_time_minutes>0){
                $gap_hour = ($end_time_hour-$start_time_hour)-1;
                $gap_minutes = 60-$start_time_minutes+$end_time_minutes;
            }
            else{
                $gap_hour = ($end_time_hour-$start_time_hour);
                $gap_minutes = $end_time_minutes;
            }

            $gap_minutes = $gap_minutes + $gap_hour*60;
            $begin_time_hour = $start_time_hour; // slot allocation starting from the given time_hour
            $begin_time_minutes = $start_time_minutes; // slot allocation starting from the given time_minutes

            if ($gap_minutes>=$duration){
                while($gap_minutes>=$duration){

                    if ($begin_time_minutes>=60){
                        $begin_time_hour+=1;
                        $begin_time_minutes-=60;
                    }
                    if(strlen($begin_time_hour)!=2){
                        $begin_time_hour="0".$begin_time_hour;
                    }
                    if(strlen($begin_time_minutes)!=2){
                        $begin_time_minutes="0".$begin_time_minutes;
                    }
                    $slots[] = $begin_time_hour."".$begin_time_minutes."h";
                    $begin_time_minutes += self::$MIN_DURATION;
                    $gap_minutes-=self::$MIN_DURATION;
                }
            }
            return $slots;
        }

        // divide time slots in between the starting time and last time for a particular employee for a particular day
        public function divideSlotsInBetween($result,$duration){
            $slots = array();

            // seek the first appointment for the day until now
            mysqli_data_seek($result, 0);
            $first_row = mysqli_fetch_array($result);

            // get the appointment end time of the first appointment
            $end_time = $first_row['end_time'];
            $end_time_minutes = substr($end_time,2,2);
            $end_time_hour = substr($end_time,0,2);
            $end_minutes_total =$end_time_hour*60+$end_time_minutes;

            while($slot = mysqli_fetch_assoc($result)){

                $next_end_time = $slot['end_time']; // end_time time to be considered in the next iteration

                $start_time = $slot['start_time']; // start_time of the next appointment
                $start_time_minutes = substr($start_time,2,2);
                $start_time_hour = substr($start_time,0,2);
                $start_minutes_total =$start_time_hour*60+$start_time_minutes;

                $difference = $start_minutes_total - $end_minutes_total;
                if ($difference>=$duration){
                    $slots_in_range = $this->divideSlotsInRange($end_time,$duration,$start_time); // previous end_time and current start_time and duration
                    foreach ($slots_in_range as $slot) {
                        $slots[] = $slot;
                    }

                }
                $end_time = $next_end_time;
                $end_time_minutes = substr($end_time,2,2);
                $end_time_hour = substr($end_time,0,2);
                $end_minutes_total =$end_time_hour*60+$end_time_minutes;
            }
            return $slots;


        }


        // time slot choosing algorithm
        public function chooseTimeSlots($result,$duration)
        {
            $divided_slots = array(); // to store the slots to return

            /* slots from opening time to the first appointment*/

            // seek the first appointment for the day until now
            mysqli_data_seek($result, 0);
            $row = mysqli_fetch_array($result);

            // select first time slot of the day until now
            $first_time = $row['start_time'];

            $divided_slots_from_start = $this->divideSlotsFromOpen($first_time, $duration);
            foreach ($divided_slots_from_start as $slot) {
                $divided_slots[] = $slot;
            }


            /* slots from in between appointments*/

            $divided_slots_in_between = $this->divideSlotsInBetween($result, $duration);
            foreach ($divided_slots_in_between as $slot) {
                $divided_slots[] = $slot;
            }


            /* slots from last appointment time to the closing time*/

            // seek the last appointment for the day until now
            $num_rows = self::$db->getNumRows($result);
            mysqli_data_seek($result, $num_rows - 1);
            $row = mysqli_fetch_array($result);

            // select last time slot of the day until now
            $last_time = $row['end_time'];

            $divided_slots_till_end = $this->divideSlotsToClose($last_time, $duration);
            foreach ($divided_slots_till_end as $slot) {
                $divided_slots[] = $slot;
            }
            return $divided_slots;
        }


        // search appointment details
        public function searchAppointmentDetails($date,$emp_id){
            // all dates, all beauticians
            if ($date=="*" && $emp_id=="*"){
                $query = "SELECT * FROM appointment a,registered_customer c,service s,employee e WHERE a.emp_id=e.emp_id AND a.service_id=s.service_id AND a.cust_id=c.cust_id ORDER BY a.appointment_date";
            }
            // date is specified, for all beauticians
            elseif ($date!="*" && $emp_id=="*"){
                $query = "SELECT * FROM appointment a,registered_customer c,service s,employee e WHERE a.appointment_date='".$date."' 
                AND a.emp_id=e.emp_id AND a.service_id=s.service_id AND a.cust_id=c.cust_id ORDER BY a.start_time";
            }
            // beautician is specified, all dates
            elseif ($date=="*" && $emp_id!="*"){
                $query = "SELECT * FROM appointment a,registered_customer c,service s,employee e 
                          WHERE a.emp_id='".$emp_id."' AND a.emp_id=e.emp_id 
                          AND a.service_id=s.service_id AND a.cust_id=c.cust_id ORDER BY a.appointment_date";
            }
            // date is specified, beautician is specified
            else{
                $query = "SELECT * FROM appointment a,registered_customer c,service s,employee e WHERE a.emp_id='".$emp_id."' AND a.appointment_date='".$date."' 
                AND a.emp_id=e.emp_id AND a.service_id=s.service_id AND a.cust_id=c.cust_id ORDER BY a.start_time";
            }

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
                                    <th>Beautician</th>
                                    <th>Cancel</th>
                                </tr>
                                </thead>
                                <tbody>";

                if (self::$db->getNumRows($result_set)>0){
                    while($appointment = mysqli_fetch_assoc($result_set)){

                        $appointment_list.= "<tr>";
                        $appointment_list.= "<td>{$appointment['appointment_id']}</td>";
                        $appointment_list.= "<td>{$appointment['appointment_date']}</td>";
                        $appointment_list.= "<td>{$appointment['start_time']}h</td>";
                        $appointment_list.= "<td>{$appointment['end_time']}h</td>";
                        $appointment_list.= "<td><a class='customer_check' id={$appointment['cust_id']}>{$appointment['cust_id']}</a></td>";
                        $appointment_list.= "<td><a class='service_check' id={$appointment['service_id']}>{$appointment['service_name']}</a></td>";
                        $appointment_list.= "<td><a class='emp_check' id={$appointment['emp_id']}>{$appointment['first_name']} {$appointment['last_name']}</a></td>";
                        $appointment_list.= "<td><a class=\"btn btn-danger btn-sm\" name=\"cancel\" value=\"Cancel\" id=\"{$appointment['appointment_id']}\"><span class=\"glyphicon glyphicon-trash\"></span>  Cancel</a></td>";
                        $appointment_list.= "</tr>";
                    }
                    $appointment_list .= "</tbody>
                                    </table>";
                    echo $appointment_list;
                }
                else{
                    echo "<p>No Search Results Found</p>";
                }
            }catch (Exception $e){
                echo $e;
            }
        }
    }



?>