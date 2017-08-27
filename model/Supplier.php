<?php 
	
	class Supplier{
        protected static $supplier_id;
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
                                    <th>Supplier Name</th>
                                    <th>Supplier Phone</th>
                                    <th>Supplier Address</th>
                                    <th>Supplier Email</th>
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
	}

 ?>