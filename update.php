<?php
    include('config.php');
    $image_id = $_POST['image_id'];
    $query = "SELECT * FROM gallery WHERE id = '$image_id' ";
    $result  = mysqli_query($connect, $query) or die(mysqli_error);
    $output = '';
    while ($row = mysqli_fetch_array($result)){
        $output .= '
        <input id="modal_path" name="modal_path" style="display:none; pointer-events:none" value="'.$row['image_path'].'"/>
        <input id="modal_id" name="modal_id" style="display:none; pointer-events:none" value="'.$row['id'].'"/>
        <input id="modal_author" name="modal_author" style="display:none; pointer-events:none" value="'.$row['author'].'"/>
        <div class="row mb-4">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <h4>Current</h4>
                <small class="text-muted">Here is the image to be updated</small> 
                <img class="img-fluid" src="'.$row['image_path'].'"/>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <h4>Preview</h4>
                <small class="text-muted">Image preview here</small> 
                <div class="container p-2">
                    <img src="uploaded_images/placeholder.webp" id="showpreview" class="img-fluid" />
                </div>
            </div>
        </div>';
    }
    echo $output;
?>