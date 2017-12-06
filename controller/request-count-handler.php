<?php require_once '../model/Database.php' ?>
<?php require_once '../model/RegisterRequest.php' ?>

<?php
    $register_request = new RegisterRequest();
    $count = $register_request ->countRequest();
    echo $count
?>
