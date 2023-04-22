<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Activities</title>
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
    <h1 class="text-center mb-5">List of Activities</h1>
    <?php
    require_once('config.php');

    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'deleted') {
            echo '<div class="alert alert-success" role="alert">Activity deleted successfully</div>';
        } elseif ($_GET['status'] == 'error') {
            echo '<div class="alert alert-danger" role="alert">Error deleting activity</div>';
        }
    }

    $sql = "SELECT * FROM activity";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Activity ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Risk Type</th>
                    <th>Cost</th>
                  </tr>
                </thead>
                <tbody>';
      while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["Aactid"]."</td>
                <td>".$row["Aname"]."</td>
                <td>".$row["Adescription"]."</td>
                <td>".$row["Arisktype"]."</td>
                <td>".$row["Acost"]."</td>
              </tr>";
      }
      echo '</tbody>
              </table>
            </div>';
    } else {
      echo "<p class='text-center'>No activities found</p>";
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