<?php require_once('Database.php') ?>

<?php

class StockItem{

    // protected static $stock_id;
    protected static $stock_brand;
    protected static $type;
    protected static $stock_count;
    protected static $price;
    protected static $description;
    protected static $supplier_id;

    protected static $db;
    protected static $connection;

    public function __construct(){
        self::$db = new Database();
        self::$connection = self::$db->connect();
    }

    public function setStock($stock_brand,$type,$stock_count,$price,$description,$supplier_id){
        self::$stock_brand = $stock_brand;
        self::$type = $type;
        self::$stock_count = $stock_count;
        self::$price = $price;
        self::$description = $description;
        self::$supplier_id = $supplier_id;

    }

    // load stock details for viewing
    public function loadStockDetails(){
        $stock_list ='';

        //getting list of stock items
        $query = "SELECT * FROM stock_item WHERE is_deleted='0' ORDER BY type";
        $stocks = self::$db->executeQuery($query);

        self::$db->verifyQuery($stocks);

        while($stock = mysqli_fetch_assoc($stocks)){
            $stock_list.= "<tr>";
            $stock_list.= "<td>{$stock['stock_id']}</td>";;
            $stock_list.= "<td>{$stock['stock_brand']}</td>";
            $stock_list.= "<td>{$stock['stock_count']}</td>";
            $stock_list.= "<td>{$stock['type']}</td>";
            $stock_list.= "<td>{$stock['price']}</td>";
            $stock_list.= "<td>{$stock['description']}</td>";
            $stock_list.= "<td>{$stock['supplier_id']}</td>";
            $stock_list.= "</tr>";
        }
        return $stock_list;
    }


    function addStock($id){

        $query = "INSERT INTO stock_item (stock_id, stock_brand, type, stock_count, price, description, supplier_id) VALUES ('"
            .$id."', '".self::$stock_brand."', '".self::$type."', '".self::$stock_count."', '"
            .self::$price."', '".self::$description."', '".self::$supplier_id."')";

        //echo $query;

        try{
            $result = self::$db->executeQuery($query);
            if ($result){
                echo "<h4>new stock successfully added.</h4>";
            }
            else{
                echo "<h4>Failed to add the new stock.</h4>";
            }
        }catch (mysqli_sql_exception $e){
            echo $e."Aruna";
        }
    }

    // search stock payment details
    public function searchStockPaymentDetails($field,$search_text){
        $query = "SELECT stock_brand , type , price FROM stock_item WHERE ".$field." LIKE '%".$search_text."%'";
        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);

            $stock_list ="<table class=\"table table-hover\">
                                <thead>
                                <tr>                                    
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>";

            if (self::$db->getNumRows($result_set)>0){
                while($stock = mysqli_fetch_assoc($result_set)){

                    $stock_list.= "<tr>";
                    $stock_list.= "<td>{$stock['stock_brand']} {$stock['type']}</td>";
                    $stock_list.= "<td><input type='text' id='qty' placeholder='1'></td>";
                    $stock_list.= "<td>{$stock['price']}</td>";
                    $stock_list.= "<td><input type='text' id='unt_Total'></td>";
                    $stock_list.= "</tr>";
                }
                $stock_list .= "</tbody>
                                    </table>";
                echo $stock_list;
            }
            else{
                echo "<p><i>No Search Results Found</i></p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }

    // view stock details
    public function viewStockDetails($field,$search_text){
        // load all data on page ready
        if ($field=="*"){
            $query = "SELECT * FROM stock_item WHERE is_deleted='0'";
        }
        elseif ($field=="all"){
            $query = "SELECT * FROM stock_item WHERE (stock_id LIKE '%".$search_text
                ."%' OR stock_brand LIKE '%".$search_text
                ."%' OR type LIKE '%".$search_text
                ."%' OR stock_count LIKE '%".$search_text
                ."%' OR price LIKE '%".$search_text
                ."%' OR description LIKE '%".$search_text
                ."%' OR supplier_id LIKE '%".$search_text."%') AND is_deleted='0'";
        }
        else{
            $query = "SELECT * FROM stock_item WHERE ".$field." LIKE '%".$search_text."%' AND is_deleted='0'";
        }

        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);

            $stock_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Stock Brand</th>
                                    <th>Type</th>
                                    <th>Stock Count</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Supplier ID</th>
                                </tr>
                                </thead>
                                <tbody>";

            if (self::$db->getNumRows($result_set)>0){
                while($stock = mysqli_fetch_assoc($result_set)){

                    $stock_list.= "<tr>";
                    $stock_list.= "<td>{$stock['stock_id']}</td>";
                    $stock_list.= "<td>{$stock['stock_brand']}</td>";
                    $stock_list.= "<td>{$stock['type']}</td>";
                    $stock_list.= "<td>{$stock['stock_count']}</td>";
                    $stock_list.= "<td>{$stock['price']}</td>";
                    $stock_list.= "<td>{$stock['description']}</td>";
                    $stock_list.= "<td>{$stock['supplier_id']}</td>";
                    $stock_list.= "</tr>";
                }
                $stock_list .= "</tbody>
                                    </table>";
                echo $stock_list;
            }
            else{
                echo "<p>No Search Results Found</p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }

    // search stock details
    public function searchStockDetails($field,$search_text){
        // load all data on page ready
        if ($field=="*"){
            $query = "SELECT * FROM stock_item WHERE is_deleted='0'";
        }
        elseif ($field=="all"){
            $query = "SELECT * FROM stock_item WHERE (stock_id LIKE '%".$search_text
                ."%' OR stock_brand LIKE '%".$search_text
                ."%' OR type LIKE '%".$search_text
                ."%' OR stock_count LIKE '%".$search_text
                ."%' OR price LIKE '%".$search_text
                ."%' OR description LIKE '%".$search_text
                ."%' OR supplier_id LIKE '%".$search_text."%') AND is_deleted='0'";
        }
        else{
            $query = "SELECT * FROM stock_item WHERE ".$field." LIKE '%".$search_text."%' AND is_deleted='0'";
        }

        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);

            $stock_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Stock Brand</th>
                                    <th>Type</th>
                                    <th>Stock Count</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Supplier ID</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>";

            if (self::$db->getNumRows($result_set)>0){
                while($stock = mysqli_fetch_assoc($result_set)){

                    $stock_list.= "<tr>";
                    $stock_list.= "<td>{$stock['stock_id']}</td>";
                    $stock_list.= "<td>{$stock['stock_brand']}</td>";
                    $stock_list.= "<td>{$stock['type']}</td>";
                    $stock_list.= "<td>{$stock['stock_count']}</td>";
                    $stock_list.= "<td>{$stock['price']}</td>";
                    $stock_list.= "<td>{$stock['description']}</td>";
                    $stock_list.= "<td>{$stock['supplier_id']}</td>";
                    $stock_list.= "<td><a class=\"btn btn-success btn-sm edit_data\" name=\"edit\" value=\"Edit\" id=\"{$stock['stock_id']}\"><span class=\"glyphicon glyphicon-edit\"></span>  Edit</a></td>";
                    $stock_list.= "<td><a class=\"btn btn-danger btn-sm delete_data\" name=\"delete\" value=\"Delete\" id=\"{$stock['stock_id']}\"><span class=\"glyphicon glyphicon-trash\"></span>  Delete</a></td>";
                    $stock_list.= "</tr>";
                }
                $stock_list .= "</tbody>
                                    </table>";
                echo $stock_list;
            }
            else{
                echo "<p><i>No Search Results Found</i></p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }

    public function updateStock($stock_id){
        $query = "UPDATE stock_item SET stock_brand='".self::$stock_brand
            ."', type = '".self::$type."', stock_count = '".self::$stock_count
            ."', price = '".self::$price."', description = '".self::$description
            ."', supplier_id = '".self::$supplier_id."'
             WHERE stock_id ='$stock_id'";

        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);
            if ($result_set){
                echo "<h4>Stock details successfully updated.</h4>";
            }

        }catch (Exception $e){
            echo $e;
        }

    }

    // get details about a particular stock item
    public function getStockData($stock_id){
        $query = "SELECT * FROM stock_item WHERE stock_id='".$stock_id."'";
        try{
            $result = self::$db->executeQuery($query);
            $row = mysqli_fetch_array($result);

            return $row;

        }
        catch(Exception $e){
            echo $e;
        }
    }

    // delete a stock record
    public function deleteStock($record_id){
        $query = "UPDATE stock_item SET is_deleted='1' WHERE stock_id='".$record_id."'";

        try{
            $result= self::$db->executeQuery($query);
            return $result;
        }catch (Exception $e){
            return $e;
        }
    }


    function viewstock($field,$search_text){
        if ($field=="*"){
            $query = "SELECT * FROM stock_item WHERE stock_count <> 0";
        }
        elseif ($field=="all"){
            $query = "SELECT * FROM stock_item WHERE stock_id LIKE '%".$search_text."%' OR stock_brand LIKE '%".$search_text."%' OR type LIKE '%".$search_text."%' AND stock_count <> 0";
        }
        else{
            $query = "SELECT * FROM stock_item WHERE ".$field." LIKE '%".$search_text."%' AND stock_count <> 0";
        }
        try{
            $result_set = self::$db->executeQuery($query);
            self::$db->verifyQuery($result_set);

            $stock_list ="<table class=\"table table-hover col-md-12\">
                                <thead>
                                <tr>
                                    <th>Product Brand</th>
                                    <th>Product Type</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>";

            if (self::$db->getNumRows($result_set)>0){
                while($stock = mysqli_fetch_assoc($result_set)){
                    $index = $stock['stock_id'];
                    $stock_count = $stock['stock_count'];
                    $stock_list.= "<tr>";
                    $stock_list.= "<td id='pbrand_$index'>{$stock['stock_brand']}</td>";
                    $stock_list.= "<td id='ptype_$index'>{$stock['type']}</td>";
                    $stock_list.= "<td id='pdescription_$index'>{$stock['description']}</td>";
                    $stock_list.= "<td id='pprice_$index'>{$stock['price']}</td>";
                    $stock_list.= "<td id='addbtn_$index'><button onclick=\"addToProductCart('$index','$stock_count')\" class=\"btn btn-success btn-sm fa fa fa-shopping-cart add\"  name=\"add\" value=\"add\" id=\"btn_$index\"><span class=\"glyphicon\"></span> Add Cart </button></td>";
                    $stock_list.= "</tr>";
                }
                $stock_list .= "</tbody>
                                    </table>";
                echo $stock_list;
            }
            else{
                echo "<p><i>No Search Results Found<i/></p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }

}

?>