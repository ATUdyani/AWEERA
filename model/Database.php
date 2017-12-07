<?php 
	
	class Database{
		protected static $connection;

		public function connect(){
			$dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass = '';
			$dbname = 'aweeradb'; 

			self::$connection = new mysqli($dbhost, $dbuser,$dbpass,$dbname);

			// checking the connection
			if(self::$connection === false) {
            	die('Database connection failed ' . mysqli_connect_error());
        	}
			
			return self::$connection;
		}

		// function to execute a SQL query
		public function executeQuery($query) {
		    try{
                // make the connection
                $connection = $this -> connect();

                // execute the query
                $result = $connection -> query($query);
                return $result;
            }catch (Exception $e) {
                echo $e;
            }
    	}

        // function to execute a SQL query
    	/*public function select($query) {
	        $rows = array();
	        $result = $this -> executeQuery($query);
	        if($result === false) {
	            return false;
	        }
	        while ($row = $result -> fetch_assoc()) {
	            $rows[] = $row;
	        }
	        return $rows;
	    }*/

    	// verify a result set
    	public function verifyQuery($result_set){
			if (!$result_set){
				die ("Database query failed. ".mysqli_error(self::$connection));
			}
		}

		/*public function removeSqlInjection($field){
			mysqli_real_escape_string(self::$connection,$field);
		}*/

		// get the number of rows in a particular result set
		public function getNumRows($result_set){
			return mysqli_num_rows($result_set);
		}

		// returns last records id in a particular table
		public function getLastRecordId($field,$table){
            try
            {
                $query = "SELECT ".$field." FROM ".$table." ORDER BY ".$field." DESC LIMIT 1";
                $result_set = $this->executeQuery($query);
                $number_of_rows = $this->getNumRows($result_set);

                $last_id_row = $result_set->fetch_row();
                $last_id = $last_id_row[0];
                return $last_id;
            } catch(Exception $e){
                echo $e;
            }
        }

        // returns last records id in a particular table without the string prefix
		public function getLastId($field,$table){
            try
            {
                $query = "SELECT ".$field." FROM ".$table." ORDER BY ".$field." DESC LIMIT 1";
                $result_set = $this->executeQuery($query);
                $number_of_rows = $this->getNumRows($result_set);

                if ($number_of_rows==0){
                    $last_id = 0;
                    return $last_id;
                }
                else{
                    //echo $number_of_rows;
                    //$result_set->data_seek($number_of_rows-1);
                    $last_id_row = $result_set->fetch_row();
                    $last_id = $last_id_row[0];
                    $last_id_no = substr($last_id,3,strlen($last_id)-1);
                    return $last_id_no;
                }
            } catch(Exception $e){
                echo $e;
            }

        }

        // generate a new key value for a table
        public function generateId($last_id, $prefix){
		    if ($last_id==0){
		        $id = sprintf("%s%'.07d",$prefix,1);
		        return $id;
            }
            else{
		        $last_id = $last_id+1;
                $id = sprintf("%s%'.07d",$prefix,$last_id);
                return $id;
            }
        }
	}

 ?>