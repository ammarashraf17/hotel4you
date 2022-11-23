<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "hotel_db");
$query = "SELECT * FROM content ORDER BY ID DESC";
$result = mysqli_query($connect, $query);

if (!isset($_SESSION['email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Hotel Directory | Your choice of hotel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
</head>

<body>
    <br /><br />
    <div class=" container">
        <h3 align="center">Hotel Directory | Your choice of hotel</h3>
        <br />
        <div class="table-responsive">
            <table id="view_data" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Title</td>
                        <td>Location</td>
                        <td>Website</td>
                        <td>Update</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    $website = $row["website"];
                    echo '  
                               <tr>  
                                    <td>' . $row["title"] . '</td>  
                                    <td>' . $row["location"] . '</td> 
									<td><a class="btn btn-default" href="' . $website . '" target="_blank">View</a></td>
									<td><a class="btn btn-primary" href="edit_content.php?edit=' . $row["id"] . '">Update</a></td>
									<td><a class="btn btn-danger" href="display_data.php?del=' . $row["id"] . '">Delete</a></td>
                               </tr>  
                               ';
                }
                ?>
            </table>
            <a href="add_content.php" class="btn btn-warning">Add New Data</a>
            <a href="logout.php" class="btn btn-warning">Logout</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#view_data').DataTable();
        });
    </script>
</body>
<?php
$connect = mysqli_connect("localhost", "root", "", "hotel_db");
if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $delete = "DELETE FROM content WHERE id='$del_id'";
    $run_delete = mysqli_query($connect, $delete);
    if ($run_delete === true) {
        echo "<script>window.open('display_data.php','_self');</script>";
    } else {
        echo "Failed, try again.";
    }
}
if (!isset($_SESSION['email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
?>

</html>