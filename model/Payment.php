<?php require_once('Database.php') ?>

<?php

class Payment
{

    protected static $db;
    protected static $connection;

    public function __construct()
    {
        self::$db = new Database();
        self::$connection = self::$db->connect();
    }

    // get appointment sum for a particular date
    public function getAppointmentPaymentSumByDate($date){

        // query to count appointments for a particular day
        $query = "SELECT SUM(paid_amount) AS payment_sum FROM payment WHERE payment_date='".$date."' AND type='Appointment'";
        try{
            $result = self::$db->executeQuery($query);
            $row = mysqli_fetch_array($result);
            return $row;

        }
        catch(Exception $e){
            echo $e;
        }
    }

    // get purchase sum for a particular date
    public function getPurchasePaymentSumByDate($date){

        // query to count appointments for a particular day
        $query = "SELECT SUM(paid_amount) AS payment_sum FROM payment WHERE payment_date='".$date."' AND type='Purchase'";
        try{
            $result = self::$db->executeQuery($query);
            $row = mysqli_fetch_array($result);
            return $row;

        }
        catch(Exception $e){
            echo $e;
        }
    }
}