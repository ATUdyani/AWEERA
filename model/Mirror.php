<?php require_once('Database.php') ?>
<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 04-Dec-17
 * Time: 6:20 PM
 */


class Mirror{

    protected static $image;
    protected static $db;
    protected static $connection;


    public function __construct(){
        self::$db = new Database();
        self::$connection = self::$db->connect();
    }


    // get all image data
    public function getMirrorImages(){
        $query = "SELECT * FROM mirror";
        try{
            $result = self::$db->executeQuery($query);
            return $result;
        }
        catch(Exception $e){
            echo $e;
        }
    }
}


?>