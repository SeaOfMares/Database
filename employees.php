<!--
/**
* CS 4342 Database Management
* @author Instruction team Fall 2021
* @version 1.0
* Description: The purpose of these file is to provide PHP basic elements for an
interface to access a DB.
* Modified by: [Your Name]
*/
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Employees</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <style>
     body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            background-color: #F4F4F4;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("https://i.imgur.com/oS6NBVZ.jpeg");
    }
    table {
  background-color: #FFFFFF;
}
  </style>
</head>
<body>
  <div class="container py-5">
    <h1 class="text-center mb-5">List of Employees</h1>
    <?php
    require_once('config.php');
    // check if status update was successful
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'updated') {
        echo '<div class="alert alert-success" role="alert">Employee status updated successfully</div>';
    } elseif ($_GET['status'] == 'error') {
        echo '<div class="alert alert-danger" role="alert">Error updating employee status</div>';
    }
}
// retrieve employees from database
$sql = "SELECT * FROM employee";
$result = $conn->query($sql);

// display employees in a table
if ($result->num_rows > 0) {
echo '<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>Employee ID</th>
<th>Name</th>
<th>SSN</th>
<th>DOB</th>
<th>Gender</th>
<th>Position</th>
<th>Salary</th>
</tr>
</thead>
<tbody>';
while($row = $result->fetch_assoc()) {
echo "<tr>
<td>".$row["Eemployeeid"]."</td>
<td>".$row["Ename"]."</td>
<td>".$row["Essn"]."</td>
<td>".$row["Edob"]."</td>
<td>".$row["Egender"]."</td>
<td>".$row["Eposition"]."</td>
<td>".$row["Esalary"]."</td>
<td>
<div class='btn-group'>
</div>
</form>
</td>
</tr>";
}
echo '</tbody></table></div>';
} else {
echo "No employees found.";
}
$conn->close();
?>

<div class="d-flex justify-content-center mt-4">
        <a href="javier.php" class="btn btn-primary">Back to Main Menu</a>
    </div>

  </div>
</body>
</html>