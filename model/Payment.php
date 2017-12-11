<?php require_once('Database.php') ?>
<?php require_once('Email.php') ?>

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
    
    // get appointment sum for a period
    public function getAppointmentPaymentSumByPeriod($fdate,$tdate){

        // query to count appointments for a period
        $query = "SELECT SUM(paid_amount) AS appointment_payment_sum FROM payment WHERE payment_date BETWEEN '".$fdate."' AND '".$tdate."' AND type='Appointment'";
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
    
    // get purchase sum for a period
    public function getPurchasePaymentSumByPeriod($fdate,$tdate){

        // query to count appointments for a period
        $query = "SELECT SUM(paid_amount) AS purchase_payment_sum FROM payment WHERE payment_date BETWEEN '".$fdate."' AND '".$tdate."' AND type='Purchase'";
        try{
            $result = self::$db->executeQuery($query);
            $row = mysqli_fetch_array($result);
            return $row;

        }
        catch(Exception $e){
            echo $e;
        }
    }

    // update appointment table and insert payment
    public function doAppointmentPayments($appId, $app_charge, $sub_total,$payment_type){
        $today = date("Y-m-d");
        $time = date("H:i:s" );
        $type  = 'appointment';
        $paid_amount = (float)$sub_total;

        $last_id=self::$db->getLastId('payment_id','payment');
        $new_id = self::$db->generateId($last_id,"PAY");


        $query = "INSERT INTO payment(payment_id,payment_date,payment_time,payment_mode,paid_amount,type) VALUE ('".$new_id."','".$today."','".$time."','".$payment_type."','".$paid_amount."','".$type."')";

        try{
            $result = self::$db->executeQuery($query);
            if($result){
                echo "<h4>Payment Done Successful!</h4>";
                echo "<h4>Thank You</h4>";
                echo "<h4>Next Customer</h4><br>";
            }else{
                echo "<h4>Sorry! Failed to make the Payment.</h4>";
            }

        }catch (ErrorException $e){
            echo $e;
        }

        for ($j = 0; $j < sizeof($appId); $j++) {
            if ($appId[$j] != "") {
                echo "<h4>" . $appId[$j] . "</h4>";
                $query = "UPDATE appointment SET payment_id = '" . $new_id . "' WHERE appointment_id = '" . $appId[$j] . "'";
                try {
                    $email = new Email();
                    $email->sendCommentEmail($appId[$j]);
                    $result = self::$db->executeQuery($query);
                    if (!$result) {
                        echo("Error update with '" . $appId[$j] . "' ");
                    }
                } catch (ErrorException $e) {
                    echo $e;
                }
            }
        }
    }
}
