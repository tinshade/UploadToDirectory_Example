<?php
    include('config.php');
    $image_id = $_POST['image_id'];
    $query = "SELECT * FROM gallery WHERE id = '$image_id' ";
    $result  = mysqli_query($connect, $query) or die(mysqli_error);
    $output = '';
    while ($row = mysqli_fetch_array($result)){
        $output .= '<div>
            <img class="img-fluid" src="'.$row['image_path'].'"/>
            <br>
            <input id="modal_id" name="modal_id" style="display:none; pointer-events:none" value="'.$row['id'].'"/>
            <br>
            <input id="modal_author" name="modal_author" style="display:none; pointer-events:none" value="'.$row['author'].'"/>
        </div>';
    }
    echo $output;
?>