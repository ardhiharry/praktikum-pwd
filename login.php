<?php

  session_start();

  require './functions/connect.php';

  if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1 ) {

      // cek password
      $row = mysqli_fetch_assoc($result);
      if( $password == $row["password"]) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
      } else {
        echo "
        <script>
          alert('Password salah');
        </script>
      ";
      }

    } else {
      echo "
        <script>
          alert('Username salah');
        </script>
      ";
    }

  }

?>

<!DOCTYPE html>
<html lang="en">
  
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  
  </head>
  
  <body>
  
    <div class="container">

      <h1 class="mt-3 mb-4">Login</h1>

      <div class="row">
        <div class="col-md-6">
          <form action="" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password">
            </div>
            <button class="btn btn-primary" type="submit" name="login">Sign in</button>
          </form>
        </div>
      </div>

    </div>
  
  </body>
  
</html>