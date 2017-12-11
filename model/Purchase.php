<?php require_once('Database.php') ?>

<?php

class Purchase{

    protected static $db;
    protected static $connection;

    public function __construct()
    {
        self::$db = new Database();
        self::$connection = self::$db->connect();
    }

    // get purchases count for a particular date
    public function getPurchaseCountByDate($date){

        // query to count purchases for a particular day
        $query = "SELECT COUNT(*) AS purchase_count FROM purchase c,payment p WHERE p.payment_date='".$date."' AND p.payment_id=c.payment_id";
        try{
            $result = self::$db->executeQuery($query);
            $row = mysqli_fetch_array($result);
            return $row;

        }
        catch(Exception $e){
            echo $e;
        }
    }
    
    // get purchases count for a period
    public function getPurchaseCountByPeriod($fdate,$tdate){

        // query to count purchases for a period
        $query = "SELECT COUNT(*) AS purchase_count FROM purchase c,payment p WHERE p.payment_date BETWEEN '".$fdate."' AND '".$tdate."' AND p.payment_id=c.payment_id";
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
