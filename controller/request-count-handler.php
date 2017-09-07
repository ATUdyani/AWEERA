<?php require_once '../model/Database.php' ?>
<?php require_once '../model/User.php' ?>

<?php
    $user = new User();
    $count = $user ->countRequest();
    echo $count
?>
