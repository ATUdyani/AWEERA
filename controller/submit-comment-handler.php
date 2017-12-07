<?php require_once "../model/Comment.php"?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 09-Sep-17
 * Time: 8:18 PM
 */

$data = json_decode($_POST['data']);
$comment = new Comment();
$result = $comment ->submitComment($data[0],$data[1]);
echo $result;
?>