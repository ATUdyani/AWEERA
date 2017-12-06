
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
        $query = "SELECT * FROM stock_item ORDER BY type";
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

    //
    public function getprducts($product_id){
        $stock_list = '';

        $query = "SELECT stock_brand , type , price FROM  stock_item WHERE type LIKE '%$product_id$'";
        $stocks = self::$db->executeQuery($query);

        self::$db->verifyQuery($stocks);

        while ($stock = mysqli_fetch_assoc($stocks)){
            $stock_list.= "<tr>";
            $stock_list.= "<td>{$stock['stock_brand']} {$stock['type']}</td>";
            $stock_list.= "<td><form method='get'></form></td>";
            $stock_list.= "<td>{$stock['price']}</td>";
            $stock_list.= "<td><form method='get'></form></td>";
        }
        return $stock_list;
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
                echo "<p>No Search Results Found</p>";
            }
        }catch (Exception $e){
            echo $e;
        }
    }

    // view stock details
    public function viewStockDetails($field,$search_text){
        // load all data on page ready
        if ($field=="*"){
            $query = "SELECT * FROM stock_item";
        }
        elseif ($field=="all"){
            $query = "SELECT * FROM stock_item WHERE stock_id LIKE '%".$search_text
                ."%' OR stock_brand LIKE '%".$search_text
                ."%' OR type LIKE '%".$search_text
                ."%' OR stock_count LIKE '%".$search_text
                ."%' OR price LIKE '%".$search_text
                ."%' OR description LIKE '%".$search_text
                ."%' OR supplier_id LIKE '%".$search_text."%'";
        }
        else{
            $query = "SELECT * FROM stock_item WHERE ".$field." LIKE '%".$search_text."%'";
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

}

?>