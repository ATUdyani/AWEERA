<?php require_once '../model/Database.php' ?>
<?php require_once '../model/Comment.php' ?>

<?php
    $comment = new Comment();
    $count = $comment ->countComment();
    echo $count
?>
