<?php
    include('config.php');
    if(count($_FILES["image"]["tmp_name"]) > 0)
    {
        foreach($_FILES['image']['tmp_name'] as $key => $value){
            $targetPath = "uploaded_images/" . basename($_FILES["image"]["name"][$key]);
            move_uploaded_file($value, $targetPath);
            $author = $_POST['author'];
            $query = mysqli_query($connect, "INSERT INTO gallery(author, image_path) VALUES('$author', '$targetPath')");


        }
    }
?>