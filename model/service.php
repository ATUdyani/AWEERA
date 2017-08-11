<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 11-Aug-17
 * Time: 11:05 PM
 */

    class Service{
        protected static $service_id;
        protected static $service_name;
        protected static $service_charge;
        protected static $description;
        protected static $duration;
        protected static $db;
        protected static $connection;

        public function __construct(){
            self::$db = new Database();
            self::$connection = self::$db->connect();
        }

        public function loadServiceNames(){
            $service_names ='';

            //getting list of service names
            $query = "SELECT * FROM service ORDER BY service_name ASC";

            try{
                $services = self::$db->executeQuery($query);
                self::$db->verifyQuery($services);

                while($service = mysqli_fetch_assoc($services)){
                    $service_names .= "<label class=\"form-check-label\">";
                    $service_names .= "<input class=\"form-check-input\" type=\"checkbox\" value=\"".$service['service_id']."\">";
                    $service_names .= $service['service_name'];
                    $service_names .= "</label> <br>";
                }
                return $service_names;

            }catch (Exception $e){
                echo $e;
            }
        }
    }