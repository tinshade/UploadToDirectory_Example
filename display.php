
<?php
    include('config.php');
    $query = "SELECT * FROM gallery ORDER BY id DESC ";
    $result  = mysqli_query($connect, $query) or die(mysqli_error);
    $output = '';
    while ($row = mysqli_fetch_array($result)){
        $output .= '
        <div class="col-md-4 col-sm-12 col-lg-4 text-center">
            <figure>
              <img class="img-fluid" src="'.$row['image_path'].'"/>
              <figcaption>'.$row['author'].'</figcaption>
            </figure>
            <div class="container mt-2 text-center">
                <button class="btn btn-warning" id="'.$row['id'].'" onclick="EditImage(this.id)">EDIT</button> 
            </div>
        </div>
        ';
    }
    echo $output;
?>