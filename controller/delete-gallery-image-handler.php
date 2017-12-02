<?php require_once "../model/Gallery.php"?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 02-Dec-17
 * Time: 9:00 PM
 */

$gallery = new Gallery();
$result = $gallery->deleteImage($_POST['image_id']);

echo $result;

?>
