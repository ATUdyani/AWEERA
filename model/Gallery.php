<?php require_once('Database.php') ?>

<?php  
	
	class Gallery{

	    protected static $path;
		protected static $date_added;
        protected static $db;
        protected static $connection;


        public function __construct(){
            self::$db = new Database();
            self::$connection = self::$db->connect();
        }

        // insert a new image to gallery
        public function addImage($path){

            // query to add the image to the database
            $query = "INSERT INTO gallery (path,date_added) VALUES('".$path."','".date("Y-m-d H:i:s")."')";

            try{
                $result = self::$db->executeQuery($query);
                if ($result){
                    echo "<h4>Image successfully added.</h4>";
                }
                else{
                    echo "<h4>Failed to add the new image.</h4>";
                }
            }catch (Exception $e){
                echo $e;
            }
        }

        // get all image data
        public function getImages(){
            $query = "SELECT * FROM gallery ORDER BY date_added DESC";
            try{
                $result = self::$db->executeQuery($query);
                return $result;
            }
            catch(Exception $e){
                echo $e;
            }
        }

        // delete a particular image
        public function deleteImage($file_name){
            $full_path = "../img/uploads/".$file_name;
            $result = unlink($full_path);
            if ($result){
                // query to remove the link from the database
                $query = "DELETE FROM gallery WHERE path='".$file_name."'";
                try{
                    $result = self::$db->executeQuery($query);
                    if ($result){
                        return "<h4>Image Successfully Deleted</h4>";
                    }
                    else{
                        return "<h4>Failed to Delete the Image</h4>";
                    }
                }
                catch(Exception $e){
                    echo $e;
                }
            }
            else{
                return "<h4>Failed to Delete the Image</h4>";
            }
        }


        // set the priority of the image to high
        public function setHighPriority($file_name){
            $full_path = "../img/uploads/".$file_name;
            // query to update the date_added to current date/time
            $query = "UPDATE gallery SET date_added='".date("Y-m-d H:i:s")."' WHERE path='".$file_name."'";
            try{
                $result = self::$db->executeQuery($query);
                if ($result){
                    return "<h4>High Priority Assigned</h4>";
                }
                else{
                    return "<h4>Failed to Set the Priority</h4>";
                }
            }
            catch(Exception $e){
                echo $e;
            }
        }
	}


 ?>