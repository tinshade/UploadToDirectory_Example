
<?php
    include('config.php');
    $query = "SELECT * FROM gallery ORDER BY id DESC ";
    $result  = mysqli_query($connect, $query) or die(mysqli_error);
    $output = '';
    while ($row = mysqli_fetch_array($result)){
        $output .= '
        <div class="col-md-4 col-sm-12 col-lg-4">
	        <div class="container bg-white p-2 m-2 shadow text-center rounded">
	        	<figure>
	              <img height="250px" style="width: 100%" src="'.$row['image_path'].'"/>
	              <small class="text-muted">Author</small><br>
	              <figcaption>'.$row['author'].'</figcaption>

	            </figure>
	            <div class="container mt-2 text-center">
	                <button class="btn btn-info" id="'.$row['id'].'" onclick="EditImage(this.id)">UPDATE</button> 
	            </div>

	        </div>
        </div>
        ';
    }
    echo $output;
?>