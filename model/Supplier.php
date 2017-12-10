<?php require_once('../model/Database.php') ?>
<?php

class Supplier{
    // protected static $supplier_id;
    protected static $supplier_name;
    protected static $supplier_phone;
    protected static $supplier_address;
    protected static $supplier_email;

    protected static $db;
    protected static $connection;

    public function __construct(){
        self::$db = new Database();
        self::$connection = self::$db->connect();
    }

    // set all the fields
    public function setSupplier($supplier_name,$supplier_phone,$supplier_address,$supplier_email){
        self::$supplier_name = $supplier_name;
        self::$supplier_phone = $supplier_phone;
        self::$supplier_address = $supplier_address;
        self::$supplier_email = $supplier_email;
    }

    // get all supplier data for a particular supplier id
    public function getSupplierData($supplier_id){
        $query = "SELECT * FROM supplier WHERE supplier_id='".$supplier_id."'";
        try{
            $result = self::$db->executeQuery($query);
            $row = mysqli_fetch_array($result);
            return $row;

        }
        catch(Exception $e){
            echo $e;
        }
    }

    // add new supplier
    public function addSupplier(){
        $last_id=self::$db->getLastId('supplier_id','supplier');

        $id = self::$db->generateId($last_id,"SUP");

        echo $id;

        $query = "INSERT INTO supplier (supplier_id, supplier_name, supplier_phone, supplier_address, supplier_email) VALUES ('"
            .$id."', '".self::$supplier_name."', '".self::$supplier_phone."', '".self::$supplier_address."', '"
            .self::$supplier_email."')";

        //echo $query;

        try{
            $result = self::$db->executeQuery($query);
            if ($result){
                echo "<h4>supplier successfully added.</h4>";
            }
            else{
                echo "<h4>Failed to add the new record.</h4>";
            }
        }catch (mysqli_sql_exception $e){
            echo $e;
        }
    }

    // fetch supplier names
    public function fetchSupplierNames(){

        $query="SELECT * FROM supplier";

        $supplier_names ='';

        $supplier_names.="<option value=\"\">Select a Supplier</option>";

        try{
            $services = self::$db->executeQuery($query);
            self::$db->verifyQuery($services);
            while($supplier = mysqli_fetch_assoc($services)){
                $supplier_names .= "<option value=\"{$supplier['supplier_id']}\">{$supplier['supplier_id']}</option>";
            }
            return $supplier_names;

        }catch (Exception $e){
            echo $e;
        }
    }

    public function loadSupplierDetails(){
        $db = new Database();
        $connection = $db->connect();
        $supplier_list ='';

        //getting list of stock items
        $query = "SELECT * FROM supplier ORDER BY supplier_name";
        $suppliers = $db->executeQuery($query);

        $db->verifyQuery($suppliers);

        while($supplier = mysqli_fetch_assoc($suppliers)){
            $supplier_list.= "<tr>";
            $supplier_list.= "<td>{$supplier['supplier_id']}</td>";
            $supplier_list.= "<td>{$supplier['supplier_name']}</td>";
            $supplier_list.= "<td>{$supplier['supplier_phone']}</td>";
            $supplier_list.= "<td>{$supplier['supplier_address']}</td>";
            $supplier_list.= "<td>{$supplier['supplier_email']}</td>";
            $supplier_list.= "<td><a href=\"modify-supplier.php?user_id={$supplier['supplier_id']}\">Edit</a></td>";
            //$supplier_list.= "<td><a href=\"delete-Supplier.php?user_id={$supplier['supplier_id']}\">Delete</a></td>";
            $supplier_list.= "</tr>";
        }
        return $supplier_list;
    }

    // view supplier details
    public function viewSupplierDetails($field,$search_text){
        // load all data on page ready
        if ($field=="*"){
            $query = "SELECT * FROM supplier";
        }
        elseif ($field=="all"){
            $query = "SELECT * FROM supplier WHERE supplier_id LIKE '%".$search_text
                ."%' OR supplier_name LIKE '%".$search_text
                ."%' OR supplier_phone LIKE '%".$search_text
                ."%' OR supplier_address LIKE '%".$search_text
                ."%' OR supplier_email LIKE '%".$search_text."%'";
        }
        else{
            $query = "SELECT * FROM supplier WHERE ".$field." LIKE '%".$search_text."%'";
        }

        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);

            $supplier_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>";

            if (self::$db->getNumRows($result_set)>0){
                while($supplier = mysqli_fetch_assoc($result_set)){

                    $supplier_list.= "<tr>";
                    $supplier_list.= "<td>{$supplier['supplier_id']}</td>";
                    $supplier_list.= "<td>{$supplier['supplier_name']}</td>";
                    $supplier_list.= "<td>{$supplier['supplier_phone']}</td>";
                    $supplier_list.= "<td>{$supplier['supplier_address']}</td>";
                    $supplier_list.= "<td>{$supplier['supplier_email']}</td>";
                    $supplier_list.= "<td><a class=\"btn btn-success btn-sm edit_data\" name=\"edit\" value=\"Edit\" id=\"{$supplier['supplier_id']}\"><span class=\"glyphicon glyphicon-edit\"></span>  Edit</a></td>";
                    $supplier_list.= "<td><a class=\"btn btn-danger btn-sm\" name=\"delete\" value=\"Delete\" id=\"{$supplier['supplier_id']}\"><span class=\"glyphicon glyphicon-trash\"></span>  Delete</a></td>";
                    $supplier_list.= "</tr>";
                }
                $supplier_list .= "</tbody>
                                    </table>";
                echo $supplier_list;
            }
            else{
                echo "<p>No Search Results Found</p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }

    // search supplier details
    public function searchSupplierDetails($field,$search_text){
        // load all data on page ready
        if ($field=="*"){
            $query = "SELECT * FROM supplier";
        }
        elseif ($field=="all"){
            $query = "SELECT * FROM supplier WHERE supplier_id LIKE '%".$search_text
                ."%' OR supplier_name LIKE '%".$search_text
                ."%' OR supplier_phone LIKE '%".$search_text
                ."%' OR supplier_address LIKE '%".$search_text
                ."%' OR supplier_email LIKE '%".$search_text ."%'";
        }
        else{
            $query = "SELECT * FROM supplier WHERE ".$field." LIKE '%".$search_text."%'";
        }

        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);

            $supplier_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Supplier Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>";

            if (self::$db->getNumRows($result_set)>0){
                while($supplier = mysqli_fetch_assoc($result_set)){

                    $supplier_list.= "<tr>";

                    $supplier_list.= "<td>{$supplier['supplier_id']}</td>";
                    $supplier_list.= "<td>{$supplier['supplier_name']}</td>";
                    $supplier_list.= "<td>{$supplier['supplier_phone']}</td>";
                    $supplier_list.= "<td>{$supplier['supplier_address']}</td>";
                    $supplier_list.= "<td>{$supplier['supplier_email']}</td>";
                    $supplier_list.= "<td><a class=\"btn btn-success btn-sm edit_data\" name=\"edit\" value=\"Edit\" id=\"{$supplier['supplier_id']}\"><span class=\"glyphicon glyphicon-edit\"></span>  Edit</a></td>";
                    $supplier_list.= "<td><a class=\"btn btn-danger btn-sm\" name=\"delete\" value=\"Delete\" id=\"{$supplier['supplier_id']}\"><span class=\"glyphicon glyphicon-trash\"></span>  Delete</a></td>";
                    $supplier_list.= "</tr>";
                }
                $supplier_list .= "</tbody>
                                    </table>";
                echo $supplier_list;
            }
            else{
                echo "<p>No Search Results Found</p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }

    public function updateSupplier($supplier_id){
        $query = "UPDATE supplier SET supplier_name='".self::$supplier_name
            ."', supplier_phone = '".self::$supplier_phone."', supplier_address = '".self::$supplier_address
            ."', supplier_email = '".self::$supplier_email."' WHERE supplier_id ='$supplier_id'";

        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);
            if ($result_set){
                echo "<h4>Supplier details successfully updated.</h4>";
            }

        }catch (Exception $e){
            echo $e;
        }

    }

}

?>