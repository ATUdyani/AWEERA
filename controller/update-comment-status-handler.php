<?php require_once "../model/Comment.php"?>

<?php
/**
 * Created by PhpStorm.
 * User: Wasura Dananjith
 * Date: 09-Sep-17
 * Time: 8:18 PM
 */

$comment = new Comment();
$result = $comment ->updateCommentStatus($_POST['appointment_id'],$_POST['status']);
echo $result;
?>