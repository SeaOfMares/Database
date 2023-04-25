
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
  <title>List of Applications</title>
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
    <h1 class="text-center mb-5">List of Applications</h1>
    <?php
    require_once('config.php');
    // check if status update was successful
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'updated') {
        echo '<div class="alert alert-success" role="alert">Application status updated successfully</div>';
    } elseif ($_GET['status'] == 'error') {
        echo '<div class="alert alert-danger" role="alert">Error updating application status</div>';
    }
}

// retrieve applications from database
$sql = "SELECT * FROM application";
$result = $conn->query($sql);

// display applications in a table
if ($result->num_rows > 0) {
  echo '<div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Application ID</th>
                <th>Status</th>
                <th>Activity ID</th>
                <th>Location</th>
                <th>Phone Number</th>
                <th>Business Type</th>
                <th>Company ID</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>';
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row["APappid"]."</td>
            <td>".$row["APstatus"]."</td>
            <td>".$row["Aactid"]."</td>
            <td>".$row["APlocation"]."</td>
            <td>".$row["APphonenumber"]."</td>
            <td>".$row["APbusinesstype"]."</td>
            <td>".$row["Ccompanyid"]."</td>
            <td>
              <form action='update_application.php' method='POST'>
                <input type='hidden' name='appid' value='".$row["APappid"]."'>
                <div class='btn-group'>
                  <button type='submit' name='status' value='Approved' class='btn btn-success'>Approve</button>
                  <button type='submit' name='status' value='Canceled' class='btn btn-danger'>Cancel</button>
                  </div><button type='submit' name='status' value='Pending' class='btn btn-warning'>Set as Pending</button>
                  </div>
                  </form>
                  </td>
                  </tr>";
                  }
                  
                  echo '</tbody></table></div>';
                  } else {
                  echo '<div class="alert alert-warning" role="alert">No applications found</div>';
                  }
                  $conn->close();
                  ?>
                  <div class="d-flex justify-content-center mt-4">
                        <a href="jose.php" class="btn btn-primary">Back</a>
                  </div>
                    </div>
                  </body>
                  </html>