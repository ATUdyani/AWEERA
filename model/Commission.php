<?php require_once('Database.php') ?>

<?php

class Commission
{

    protected static $db;
    protected static $connection;

    public function __construct()
    {
        self::$db = new Database();
        self::$connection = self::$db->connect();
    }

    // get appointment sum for a particular date
    public function getBeauticianCommissionSumByDate($date,$emp_id){

        // query to count appointments for a particular day

        $add_query = "SELECT SUM(s.service_charge * s.commission_percentage/100) AS commission, e.first_name AS employee_name 
        FROM service s , appointment a , employee e 
        WHERE s.service_id=a.service_id AND a.emp_id=e.emp_id AND a.appointment_date='".$date."' AND e.emp_id='".$emp_id."'  ";
        
        //$query = "SELECT SUM(commission) AS total_commission FROM beautician_commission WHERE emp_id='".$emp_id."'";
        try{
            $result = self::$db->executeQuery($add_query);
            //$result2 = self::$db->executeQuery($query);
            $row = mysqli_fetch_array($result);
            return $row;

        }
        catch(Exception $e){
            echo $e;
        }
    }


}