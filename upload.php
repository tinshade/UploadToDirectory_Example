<!-- <?php
// include('config.php');

// if(count($_FILES["image"]["tmp_name"]) > 0)
// {
//     for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++)
//     {
//         $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
//         $query = "INSERT INTO tbl_images(image_path) VALUES ('$image_file')";
//         if(mysql_query($query)){
//             move_uploaded_file($_FILES['image']['name'][$count], "uploaded_images/".$image_file);
//         }else{
//             echo "<script>alert('Fail')</script>";
//         }    

//     }
// }


?> -->
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