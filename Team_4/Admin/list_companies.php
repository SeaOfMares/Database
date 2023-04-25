<!--
/**
* CS 4342 Database Management
* @author Instruction team Fall 2021 with contribution from L. Garnica
* @version 2.0
* Description: The purpose of these file is to provide PHP basic elements for an
interface to access a DB.
* Resources: https://getbootstrap.com/docs/4.5/components/alerts/ -- bootstrap
examples
* Modified by: David Mares
*/
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Companies</title>
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
  </style>
</head>
<body>
  <div class="container py-5">
    <h1 class="text-center mb-5">List of Companies</h1>
    <?php
    require_once('config.php');

    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'deleted') {
            echo '<div class="alert alert-success" role="alert">Company deleted successfully</div>';
        } elseif ($_GET['status'] == 'error') {
            echo '<div class="alert alert-danger" role="alert">Error deleting company</div>';
        }
    }

    $sql = "SELECT * FROM company";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Company ID</th>
                    <th>Name</th>
                    <th>Number of Employees</th>
                    <th>Owner ID</th>
                    <th>Location Status</th>
                  </tr>
                </thead>
                <tbody>';
      while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["Ccompanyid"]."</td>
                <td>".$row["Cname"]."</td>
                <td>".$row["Cnumemployees"]."</td>
                <td>".$row["Oownerid"]."</td>
                <td>".$row["Clocation_status"]."</td>
              </tr>";
      }
      echo '</tbody>
              </table>
            </div>';
    } else {
      echo "<p class='text-center'>No companies found</p>";
    }
    $conn->close();
    ?>
    <div class="d-flex justify-content-center mt-4">
        <a href="project_menu.php" class="btn btn-primary">Back to Main Menu</a>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>