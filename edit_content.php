<?php  
 session_start();

 if(!isset($_SESSION['email'])){
	 echo "<script>window.open('login.php','_self')</script>";
 } 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hotel Directory | Your choice of hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
  <h2>Edit Content</h2>
  
  <?php
	$conn = mysqli_connect ('localhost','root','','hotel_db');
	if(isset($_GET['edit'])){
		$edit_id = $_GET['edit'];
	
	$select = "SELECT * FROM content WHERE id='$edit_id'";
	$run = mysqli_query($conn,$select);
	$row_content = mysqli_fetch_array($run);
		$title = $row_content['title'];
		$location = $row_content['location'];
		$website = $row_content['website'];
	}
	
?>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" value="<?php echo $title?>" placeholder="Enter title" name="title">
    </div>
    <div class="form-group">
      <label>Location</label>
      <input type="text" class="form-control" value="<?php echo $location?>" placeholder="Enter name of location" name="location">
    </div>
	<div class="form-group">
      <label>Website</label>
      <input type="text" class="form-control" value="<?php echo $website?>" placeholder="Enter link of website" name="website">
    </div>

    <input type="submit" name="insert-btn" class="btn btn-primary">
  </form>

<?php
$conn = mysqli_connect ('localhost','root','','hotel_db');

if (isset($_POST['insert-btn'])){
	
	$etitle = $_POST['title'];
	$elocation = $_POST['location'];
	$ewebsite = $_POST['website'];
	
	$update = "UPDATE content SET title='$etitle',location='$elocation',website='$ewebsite' WHERE id='$edit_id'";
	
	$run_update = mysqli_query($conn,$update);
	if($run_update === true){
		echo "<script>window.open('display_data.php','_self');</script>";
	}else{
		echo "Failed. Try again";
	}
}
?>
  
</div>

</body>
</html>