<?php require_once('Database.php') ?>

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
        public function setService($service_id,$service_name,$service_charge,$description,$duration,$commission_percentage){

            self::$service_id = $service_id;
            self::$service_name = $service_name;
            self::$service_charge = $service_charge;
            self::$description = $description;
            self::$duration = $duration;
            self::$commission_percentage = $commission_percentage;

        }

        // get all service data for a particular service id
        public function getServiceData($service_id){
            $query = "SELECT * FROM service WHERE service_id='".$service_id."'";
            try{
                $result = self::$db->executeQuery($query);
                $row = mysqli_fetch_assoc($result);
                return $row;

            }
            catch(Exception $e){
                echo $e;
            }
        }

        // add a new service
        public function addService(){

            $query = "INSERT INTO service (service_id, service_name, service_charge, description, duration, commission_percentage) VALUES ('".
                self::$service_id."', '".self::$service_name."', '".self::$service_charge."', '".self::$description."', '".self::$duration."', '".self::$commission_percentage."')";


            try{
                $result = self::$db->executeQuery($query);
                if ($result){
                    echo "<h4>Service successfully added.</h4>";
                }
                else{
                    echo "<h4>Failed to add the new record.</h4>";
                }
            }catch (mysqli_sql_exception $e){
                echo "<h4>".$e."</h4>";
            }
        }


        // load service names to checkboxes
        public function loadServiceNames(){
            $service_names ='';

            //get list of service names
            $query = "SELECT * FROM service WHERE is_deleted='0' ORDER BY service_name ASC";

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


        // search service details
        public function searchServiceDetails($field,$search_text){
            // load all data on page ready
            if ($field=="*"){
                $query = "SELECT * FROM service WHERE is_deleted='0'";
            }
            elseif ($field=="all"){
                $query = "SELECT * FROM service WHERE (service_id LIKE '%".$search_text
                    ."%' OR service_name LIKE '%".$search_text
                    ."%' OR service_charge LIKE '%".$search_text
                    ."%' OR description LIKE '%".$search_text
                    ."%' OR duration LIKE '%".$search_text
                    ."%' OR commission_percentage LIKE '%".$search_text."%') AND is_deleted='0'";
            }
            else{
                $query = "SELECT * FROM service WHERE ".$field." LIKE '%".$search_text."%' AND is_deleted='0'";
            }

            try{
                $result_set = self::$db->executeQuery($query);
                self::$db->verifyQuery($result_set);

                $service_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Service Name</th>
                                    <th>Service Charge</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Commission Percentage</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>";

                if (self::$db->getNumRows($result_set)>0){
                    while($service = mysqli_fetch_assoc($result_set)){

                        $service_list.= "<tr>";
                        $service_list.= "<td>{$service['service_id']}</td>";
                        $service_list.= "<td>{$service['service_name']}</td>";
                        $service_list.= "<td>{$service['service_charge']}</td>";
                        $service_list.= "<td>{$service['description']}</td>";
                        $service_list.= "<td>{$service['duration']}</td>";
                        $service_list.= "<td>{$service['commission_percentage']}</td>";
                        $service_list.= "<td><a class=\"btn btn-success btn-sm edit_service\" name=\"edit\" value=\"Edit\" id=\"{$service['service_id']}\"><span class=\"glyphicon glyphicon-edit\"></span>  Edit</a></td>";
                        $service_list.= "<td><a class=\"btn btn-danger btn-sm delete_data\" name=\"delete\" value=\"Delete\" id=\"{$service['service_id']}\"><span class=\"glyphicon glyphicon-trash\"></span>  Delete</a></td>";
                        $service_list.= "</tr>";
                    }
                    $service_list .= "</tbody>
                                    </table>";
                    echo $service_list;
                }
                else{
                    echo "<p><i>No Search Results Found</i></p>";
                }
            }catch (Exception $e){
                echo $e;
            }
        }


        // update service details
        public function updateService($service_id){
            $query = "UPDATE service SET service_name='".self::$service_name
                ."', service_charge = '".self::$service_charge."', description = '".self::$description."', duration = '"
                .self::$duration."', commission_percentage = '".self::$commission_percentage."' WHERE service_id ='$service_id'";

            try{
                $result_set = self::$db->executeQuery($query);
                self::$db->verifyQuery($result_set);
                if ($result_set){
                    echo "<h4>Service successfully updated.</h4>";
                }
            }catch (Exception $e){
                echo $e;
            }
        }

        // fetch all service types to appointment page
        public function viewAllServiceTypes(){
            $service_types ='';

            $query="SELECT DISTINCT description from service WHERE is_deleted='0'";
            try{
                $services = self::$db->executeQuery($query);
                self::$db->verifyQuery($services);
                while($service = mysqli_fetch_assoc($services)){
                    $service_types .= "<option value=\"{$service['description']}\">{$service['description']}</option>";
                }
                return $service_types;

            }catch (Exception $e){
                echo $e;
            }
        }

        // fetch suitable service names to appointment page for a particular service type/description
        public function fetchServiceNames($description){
            $service_names ='';

            $query="SELECT * FROM service WHERE description='$description' AND is_deleted='0'";

            $service_names.="<select name=\"select_service_name\" id=\"select_service_name\" class=\"form-control\"><option value=\"\">Select a Service Type</option>";

            try{
                $services = self::$db->executeQuery($query);
                self::$db->verifyQuery($services);
                while($service = mysqli_fetch_assoc($services)){
                    $service_names .= "<option value=\"{$service['service_id']}\">{$service['service_name']}</option>";
                }
                $service_names.="</select>";
                return $service_names;

            }catch (Exception $e){
                echo $e;
            }
        }

        // fetch service duration for a particular service_id
        public function fetchServiceDuration($service_id){
            $query="SELECT duration FROM service WHERE service_id='$service_id'";

            try{
                $result = self::$db->executeQuery($query);
                $duration =mysqli_fetch_assoc($result);
                self::$db->verifyQuery($result);
                return $duration['duration'];

            }catch (Exception $e){
                echo $e;
            }
        }

        // delete a service record
        public function deleteService($record_id){
            $query = "UPDATE service SET is_deleted='1' WHERE service_id='".$record_id."'";

            try{
                $result= self::$db->executeQuery($query);
                return $result;
            }catch (Exception $e){
                return $e;
            }
        }
    }