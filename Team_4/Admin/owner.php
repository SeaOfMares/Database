<!--
/**
* CS 4342 Database Management
* @author Instruction team Fall 2021 with contribution from L. Garnica
* @version 2.0
* Description: The purpose of these file is to provide PHP basic elements for an
interface to access a DB.
* Resources: https://getbootstrap.com/docs/4.5/components/alerts/ -- bootstrap
examples
* Modified by: Javier Venegas
*/
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Owners</title>
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
    <h1 class="text-center mb-5">List of Owners</h1>
    <?php
    require_once('config.php');

    // Get the company ID from the query string
    $company_id = $_GET['id'];

    // Use the company ID to filter the rows
    $sql = "SELECT * FROM owner WHERE Ccompanyid = $company_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Owner ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Home Address</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>';
      while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["Oownerid"]."</td>
                <td>".$row["Oname"]."</td>
                <td>".$row["Ogender"]."</td>
                <td>".$row["Odob"]."</td>
                <td>".$row["Ohomeaddress"]."</td>
                <td>".$row["Ophonenumber"]."</td>
                <td>".$row["Oemail"]."</td>
              </tr>";
      }
      echo '</tbody>
            </table>
            <a href="licenses.php" class="btn btn-secondary mt-3">Back</a>
            </div>';
    } else {
      echo "<p>No owners found for this company</p>";
    }
    $conn->close();
    ?>
  </div>
</body>
</html>