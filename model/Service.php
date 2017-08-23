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
        protected static $commission_percentage;
        protected static $db;
        protected static $connection;

        // default constructor
        public function __construct(){
            self::$db = new Database();
            self::$connection = self::$db->connect();
        }

        // set fields
        public function setService($service_name,$service_charge,$description,$duration,$commission_percentage){

            self::$service_name = $service_name;
            self::$service_charge = $service_charge;
            self::$description = $description;
            self::$duration = $duration;
            self::$commission_percentage = $commission_percentage;

        }

        // add a new service
        function addService(){
            $last_id=self::$db->getLastId('service_id','service');

            $id = self::$db->generateId($last_id,"SER");

            echo $id;

            $query = "INSERT INTO service (service_id, service_name, service_charge, description, duration, commission_percentage) VALUES ('".
                $id."', '".self::$service_name."', '".self::$service_charge."', '".self::$description."', '".self::$duration."', '".self::$commission_percentage."')";

            echo $query;

            try{
                $result = self::$db->executeQuery($query);
                if ($result){
                    echo "Service successfully added.";
                }
                else{
                    echo "Failed to add the new record.";
                }
            }catch (mysqli_sql_exception $e){
                echo $e;
            }
        }


        public function loadServiceDetails(){
            $service_list ='';

            //getting list of employee items
            $query = "SELECT * FROM service ORDER BY service_name";

            try{
                $services = self::$db->executeQuery($query);
                self::$db->verifyQuery($services);

                while($service = mysqli_fetch_assoc($services)){
                    $service_list.= "<tr>";
                    $service_list.= "<td>{$service['service_id']}</td>";
                    $service_list.= "<td>{$service['service_name']}</td>";
                    $service_list.= "<td>{$service['service_charge']}</td>";
                    $service_list.= "<td>{$service['description']}</td>";
                    $service_list.= "<td>{$service['duration']}</td>";
                    $service_list.= "<td>{$service['commission_percentage']}</td>";
                    $service_list.= "<td><a class=\"btn btn-success btn-sm edit_data\" name=\"edit\" value=\"Edit\" id=\"{$service['service_id']}\"><span class=\"glyphicon glyphicon-edit\"></span>  Edit</a></td>";
                    $service_list.= "<td><a class=\"btn btn-danger btn-sm\" name=\"delete\" value=\"Delete\" id=\"{$service['service_id']}\"><span class=\"glyphicon glyphicon-trash\"></span>  Delete</a></td>";
                    $service_list.= "</tr>";
                }
                return $service_list;

            }catch (Exception $e){
                echo $e;
            }
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
                    $service_names .= "<input class=\"form-check-input\" type=\"checkbox\" name=\"services\" value=\"".$service['service_id']."\">";
                    $service_names .= $service['service_name'];
                    $service_names .= "</label> <br>";
                }
                return $service_names;

            }catch (Exception $e){
                echo $e;
            }
        }
    }