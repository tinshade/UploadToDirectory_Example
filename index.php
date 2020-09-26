
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    <title>Upload to directory with PHP!</title>
  </head>
  <body>
    <section id="main">
        <div class="container text-center grad p-5 mt-5 mb-5">
        <h2 style="color: #3b0045;text-shadow: 1px 2px 10px lightgrey;">Upload Multiple Images To Directory and MYSQL Database using PHP &amp; AJAX !</h2>
        <br>
        <h5 style="color: white;text-shadow: 1px 2px 10px grey;">All Images go in the `uploaded_images` folder!</h5>
        <h6 class="text-danger" style="text-transform: uppercase; text-shadow: 0px 1px 2px white">make sure you have it</h6>
            <form id="Form1" enctype="multipart/form-data" method="POST" class="form-group mt-5 mb-5 p-5 shadow bg-white rounded">
                <label>Author</label>
                <input type="text" id="author" name="author" class="form-control" placeholder="Who is the author?" />
                <br>
                <label>Image(s):</label>
                <input type="file" multiple class="form-control" name="image[]" id="image" title="Upload images!">
                <br>
                <br>
                <div class="mt-3">
                    <button type="submit" id="submit" name="submit" class="btn btn-info">UPLOAD</button>
                    <br />  
                <br />
                </div>
                
                
            </form>
            <br />  
            <br />
            <hr style="background-color: #3b0045; width: 80%; margin: 0 auto;">
            <br />
            <br />
            <div class="container mt-2">
                <div class="row" id="gallery">
                    
                </div>
            </div>
            <br>
            <br>
            <div class="container text-center text-white mt-5 pt-5" id="credits">
                <small style="color:white">Made with <span style="color: red;">&#x2764;</span> by <a href="https://github.com/tinshade" title="My GitHub" style="color:white">Abhishek Iyengar</a></small>
            </div>
        </div>
    </section>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Update Image</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="updateform">
	        	<div class="container p-2">
	        		<div class="container" id="current">
	        		</div>
		        	<input type="file" class="form-control" name="singleimage[]" id="singleimage" title="Updated image">
		        	<br>
		        	<button class="btn btn-primary" type="submit" id="update_btn">UPDATE</button>
		        	<br>
	        	</div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="preview.js"></script>
    <script>  
        $(document).ready(function(){
            load_images();
            function load_images()
            {
                $.ajax({
                    url:"display.php",
                    success:function(data)
                    {
                        $('#gallery').html(data);
                    }
                });
            }
        
            $('#Form1').on('submit', function(event){
                event.preventDefault();
                var image_name = $('#image').val();
                var author = $('#author').val();
                if(image_name == '')
                {
                    alert("Please Select Image");
                    return false;
                }
                else
                {
                    $.ajax({
                        url:"upload.php",
                        method:"POST",
                        data: new FormData(this),
                        async:true,
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(data)
                        {
                            $('#author').val('');
                            $('#image').val('');
                            load_images();
                        },
                        error:function(xhr){
                            console.log(xhr);
                        }
                    });
                }
            });
        
        });  
    </script>
    <script>
        function EditImage(image_id){
            $.ajax({
                url:"update.php",
                method:"POST",
                data: 'image_id='+image_id,
                success:function(data){
                    $('#current').html(data);
                },
                error:function(error){
                    console.log(error);
                }

            });
            $("#exampleModal").modal("show");
        }
       $('#updateform').on('submit', function(event){
                event.preventDefault();
                var image_name = $('#singleimage').val();
                var author = $('#modal_author').val();
                var image_id = $('#modal_id').val();
                if(image_name == '')
                {
                    alert("Please Select Image");
                    return false;
                }
                else
                {
                    $.ajax({
                        url:"change.php",
                        method:"POST",
                        data: new FormData(this),
                        async:true,
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(data)
                        {
                            alert('Done');
                            load_images();
                            $("#exampleModal").modal("hide");
                        },
                        error:function(xhr){
                            console.log(xhr);
                        }
                    });
                }
            });
       function load_images()
            {
                $.ajax({
                    url:"display.php",
                    success:function(data)
                    {
                        $('#gallery').html(data);
                    }
                });
            }
    </script>
  </body>
</html>