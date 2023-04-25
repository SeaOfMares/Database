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
  <title>List of Licenses</title>
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
    <h1 class="text-center mb-5">List of Licenses</h1>
    <?php
    require_once('config.php');

    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'deleted') {
            echo '<div class="alert alert-success" role="alert">License deleted successfully</div>';
        } elseif ($_GET['status'] == 'error') {
            echo '<div class="alert alert-danger" role="alert">Error deleting license</div>';
        }
    }

    $sql = "SELECT * FROM license";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>License ID</th>
                    <th>Issue Date</th>
                    <th>Expiration Date</th>
                    <th>Agent ID</th>
                    <th>Status</th>
                    <th>Company ID</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>';
      while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["Llicenseid"]."</td>
                <td>".$row["Lissuedate"]."</td>
                <td>".$row["Lexpirationdate"]."</td>
                <td>".$row["Lagentid"]."</td>
                <td>".$row["Lstatus"]."</td>
                <td>".$row["Ccompanyid"]."</td>
                <td>
                <a href='edit_license.php?id=".$row["Llicenseid"]."'>Edit Status</a>
                <a href='owner.php?id=".$row["Ccompanyid"]."'>Owner</a>
                <a href='company.php?id=".$row["Ccompanyid"]."'>Company</a>
                <a href='employee.php?id=".$row["Lagentid"]."'>Employee</a>
                </td>

              </tr>";
                }
                echo '</tbody>
                </table>
                <a href="project_menu.php" class="btn btn-secondary mt-3">Back to Previous Menu</a>
                </div>';
                } else {
                echo "<p>No licenses found</p>";
                }
                $conn->close();
                ?>
                </div>
</body>
</html>