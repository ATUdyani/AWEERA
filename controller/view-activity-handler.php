<?php require_once '../model/Database.php' ?>
<?php require_once '../model/ActivityLog.php' ?>

<?php
/**
 * Created by PhpStorm.
 * User: Thilakshika-PC
 * Date: 2018-01-04
 * Time: 12:47 PM
 */

$data = json_decode(stripslashes($_POST['data']));

$activity_log = new ActivityLog();
$activity_log -> viewActivityLogDetails($data[0],$data[1]);
?>

