<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "hotel_db");
$query = "SELECT * FROM user ORDER BY ID DESC";
$result = mysqli_query($connect, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&display=swap');

    body {
      background-color: #F6C12E;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;

    }

    section {
      font-family: 'Baloo Tamma 2', cursive;

      background-color: #EFF6F8;
      width: 240px;
      height: 320px;
      border: 4px solid #793D52;
      border-radius: 7px;
      text-align: center;

    }

    h1 {
      text-transform: uppercase;
      color: #793D52;
      margin-bottom: 10px;
      letter-spacing: -.9px;
    }

    .input {
      width: 175px;
      border: 3px solid #793D52;
      border-radius: 5px;
      font-size: 15px;
      padding: 5px;
    }

    .input2 {
      margin-top: 15px;
      width: 175px;
      border: 3px solid #793D52;
      border-radius: 5px;
      font-size: 15px;
      padding: 5px;
    }

    .textbox {
      margin-top: 15px;
      height: 50px;
      width: 175px;
      border: 3px solid #793D52;
      border-radius: 5px;
      font-size: 15px;
      padding: 5px;
    }

    .enviar {
      font-size: 1.2em;
      margin-top: 10px;
      width: 90px;
      height: 40px;
      background-image: linear-gradient(#AEE100, #93C600, #93C600, #93C600, #93C600, #AEE100);
      border: 3px solid #793D52;
      border-radius: 5px;
      color: #FDFEFB;
      font-family: 'Baloo Tamma 2', cursive;
    }

    .limpar {
      color: #FDFEFB;
      margin-top: 10px;
      width: 90px;
      height: 40px;
      background-image: linear-gradient(#AEE100, #93C600, #93C600, #93C600, #93C600, #AEE100);
      border: 3px solid #793D52;
      border-radius: 5px;
      font-family: 'Baloo Tamma 2', cursive;
      font-size: 1.2em;

    }

    button:hover {
      background-image: linear-gradient(#93C600, #AEE100, #AEE100, #AEE100, #AEE100, #93C600);
    }

    span {

      width: 20px;
      height: 320px;
      background-color: #B2B2B2;
      margin-top: 0px;
      margin-left: -10px;
      border: 4px solid #793D52;
      border-radius: 7px;
      z-index: -1;

    }
  </style>
</head>

<body>
  <br>
  <section class="box">
    <h1>Sign Up Here!</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="text" placeholder="Insert user_name" name="user_name" class="input">
      <input type="user_email" placeholder="Insert user_email" name="user_email" class="input2">
      <input type="password" placeholder="Insert password" name="user_password" class="textbox">
      <br>
      <button type="submit" name="insert-btn" class="enviar"> Submit
      </button>
      <button type="reset" class="limpar"> Reset </button>
    </form>


  </section>
  <span></span>
  <?php
  $conn = mysqli_connect("localhost", "root", "", "hotel_db");

  if (isset($_POST['insert-btn'])) {

    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $insert = "INSERT INTO user(user_name,user_email,user_password)
    VALUES('$user_name','$user_email','$user_password')";
    $run_insert = mysqli_query($conn, $insert);
    if ($run_insert === true) {
      $_SESSION['status'] = "Sign Up Completed";
      echo "<script>window.open('display_data.php','_self');</script>";
    } else {
      echo "Failed. Try again";
    }
  }


  ?>
</body>

</html>