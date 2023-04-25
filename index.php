<!--
/**
* CS 4342 Database Management
* @author Instruction team Fall 2021 with contribution from L. Garnica
* @version 2.0
* Description: The purpose of these file is to provide PHP basic elements for an
interface to access a DB.
* Resources: https://getbootstrap.com/docs/4.5/components/alerts/ -- bootstrap
examples
* Modified by: Jose Luis Espinoza Gonzalez
*/
-->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CS 4342 User Login</title>
  <!-- Bootstrap CSS library https://getbootstrap.com/ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style>
    body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            background-color: #F4F4F4;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("https://i.imgur.com/oS6NBVZ.jpeg");
    }
    h1 {
      margin-bottom: 30px;
      font-size: 36px;
      font-weight: bold;
      text-align: center;
      text-transform: uppercase;
      color: #333;
    }
    form {
      max-width: 350px;
      margin: 0 auto;
    }
    label {
      font-size: 18px;
      font-weight: bold;
      color: #333;
      margin-bottom: 5px;
    }
    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 10px 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      margin-bottom: 20px;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      font-size: 18px;
      font-weight: bold;
      padding: 10px 15px;
      border-radius: 5px;
    }
    .btn-primary:hover {
      background-color: #0069d9;
      border-color: #0062cc;
    }
    a {
      font-size: 16px;
      color: #007bff;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>User Login</h1>
    <form action="index.php" method="post">
      <div class="form-group">
        <label for="username">User Name</label>
        <input class="form-control" type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <button class="btn btn-primary" name="Submit" type="submit">Submit</button>
      </div>
    </form>
    <p class="text-center"><a href="create_user.php">Don't have an account? Create one now!</a></p>
  </div>
  <!-- jQuery and JS bundle w/ Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2ht

</body>

</html>


<?php
session_start();
require_once("config.php");
$_SESSION['logged_in'] = false;

if (!empty($_POST)) {
  if (isset($_POST['Submit'])) {
    $input_username = isset($_POST['username']) ? $_POST['username'] : "";
    $input_password = isset($_POST['password']) ? $_POST['password'] : "";

    $queryUser = "SELECT * FROM User  WHERE Uusername='" . $input_username . "' AND UPassword='" . $input_password . "';";
    $resultUser = $conn->query($queryUser);

    if ($resultUser->num_rows > 0) {
      //if there is a result, that means that the user was found in the database
      $user = $resultUser->fetch_assoc();
      $_SESSION['user'] = $user['Uusername'];
      $_SESSION['logged_in'] = true;

      // Check if the logged in user is admin with password admin1
      if ($_SESSION['user'] == "admin" && $input_password == "admin1") {
        header("Location: project_menu.php");
        die();
      } else {
        header("Location: user_menu.php");
        die();
      }
    } else {
      echo "User not found.";
    }
    die();
  }
}
?>