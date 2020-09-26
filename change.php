<?php
    include('config.php');
    if(count($_FILES["singleimage"]["tmp_name"]) > 0)
    {
        foreach($_FILES['singleimage']['tmp_name'] as $key => $value){
            $temp = explode(".", $_FILES["singleimage"]["name"][$key]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($value, "uploaded_images/" . $newfilename);
            $remove_path = $_POST['modal_path'];
            unlink($remove_path);
            $author = $_POST['modal_author'];
            $image_id = $_POST['modal_id'];
            $targetPath = ("uploaded_images/" . $newfilename);
            $query = mysqli_query($connect, "UPDATE gallery SET image_path='$targetPath' WHERE id='$image_id'");
        }
    }
?>