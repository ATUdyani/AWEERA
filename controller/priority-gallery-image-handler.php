<?php require_once "../model/Gallery.php"?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 02-Dec-17
 * Time: 10:00 PM
 */


$gallery = new Gallery();
$result = $gallery->setHighPriority($_POST['image_id']);

echo $result;

?>
