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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CS4342 Create User Account</title>
	<h1>Welcome to El Paso County Tourism Department</h1>

	<!-- Import Bootstrap CSS library -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

	<style>
           body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            background-color: #F4F4F4;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("https://i.imgur.com/oS6NBVZ.jpeg");
    }
		.container {
			max-width: 500px;
			margin-top: 20px;
		}

		h1 {
			text-align: center;
			margin-bottom: 30px;
		}

		form {
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}

		.form-group {
			margin-bottom: 20px;
		}

		label {
			font-weight: bold;
			margin-bottom: 5px;
			display: block;
		}

		input[type="text"],
		input[type="password"] {
			border-radius: 5px;
			border: none;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			padding: 10px;
			width: 100%;
			margin-bottom: 20px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

		a {
			display: block;
			margin-top: 20px;
			text-align: center;
			color: #007bff;
			font-weight: bold;
			font-size: 18px;
			text-decoration: none;
		}

		a:hover {
			color: #0056b3;
		}

	</style>
</head>
<body>
	<div class="container">
		<h1>Create User</h1>
		<form action="create_user.php" method="post">
			<div class="form-group">
				<label for="username">User Name</label>
				<input class="form-control" type="text" id="username" name="username" required>
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input class="form-control" type="password" id="password" name="password" required>
			</div>

			<div class="form-group">
				<input class="btn btn-success btn-block" name="submit" type="submit" value="Submit">
			</div>
		</form>

		<div>
			<a href="index.php">Back to User Login Menu</a>
		</div>
	</div>

	<!-- Import jQuery and JS bundle w/ Popper.js -->
	<script src="https://code.jquery.com/jquery-3

        <!-- PHP code starts here -->
        <?php
        require_once('config.php');
        
        if (isset($_POST['Submit'])) {
            // Grab information from the form submission and store values into variables
            $username = isset($_POST['username']) ? $_POST['username'] : "";
            $password = isset($_POST['password']) ? $_POST['password'] : "";

            // Insert into User table
            $queryUser = "INSERT INTO User (Uusername, Upassword)
                          VALUES ('".$username."', '".$password."');";

            if ($conn->query($queryUser) === TRUE) {
                echo "<p>New user created successfully with the username: ".$username."</p>";
            } else {
                echo "Error: " . $queryUser . "<br>" . $conn->error;
            }
            // If you want to redirect without seeing messages printed, uncomment the following line:
            //header("Location: index.php");
        }
        ?>
    </div>
</body>

</html>