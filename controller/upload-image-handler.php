<?php

if(isset($_FILES["file"]["type"]))
{
    $valid_extensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = strtolower(end($temporary));

    if ((($_FILES["file"]["type"] == "image/png") ||
            ($_FILES["file"]["type"] == "image/jpg") ||
            ($_FILES["file"]["type"] == "image/jpeg"))
        && ($_FILES["file"]["size"] < 100000000) //Approx. 100mb files can be uploaded.
        && in_array($file_extension, $valid_extensions)) {

        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        }
        else
        {
            $file_name_new = uniqid('',true).".".$file_extension;

            if (file_exists("../img/uploads/". $file_name_new)) {
                echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
            }
            else
            {
                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "../img/uploads/".$file_name_new; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

                echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
                echo "<br/><b>New File Name:</b> " . $file_name_new . "<br>";
                echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
                echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
            }
        }
    }
    else
    {
        echo "<span id='invalid'>***Invalid file Size or Type***<span>";
    }
}
?>