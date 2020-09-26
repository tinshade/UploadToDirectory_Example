<?php
    include('config.php');
    if(count($_FILES["image"]["tmp_name"]) > 0)
    {
        foreach($_FILES['image']['tmp_name'] as $key => $value){
            $temp = explode(".", $_FILES["image"]["name"][$key]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($value, "uploaded_images/" . $newfilename);
            $targetPath = ("uploaded_images/" .$newfilename);
            $author = $_POST['author'];
            $query = mysqli_query($connect, "INSERT INTO gallery(author, image_path) VALUES('$author', '$targetPath')");
        }
    }
?>