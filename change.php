<?php
    include('config.php');
    if(count($_FILES["singleimage"]["tmp_name"]) > 0)
    {
        foreach($_FILES['singleimage']['tmp_name'] as $key => $value){
            $targetPath = "uploaded_images/" . basename($_FILES["singleimage"]["name"][$key]);
            move_uploaded_file($value, $targetPath);
            $author = $_POST['modal_author'];
            $image_id = $_POST['modal_id'];
            $query = mysqli_query($connect, "UPDATE gallery SET image_path='$targetPath' WHERE id='$image_id'");


        }
    }
?>