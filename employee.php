<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Information</title>
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
    <h1 class="text-center mb-5">Employee Information</h1>
    <?php
    require_once('config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM employee WHERE Eemployeeid='" . $id . "'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          echo '<div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Name:</td>
                      <td>' . $row["Ename"] . '</td>
                    </tr>
                    <tr>
                      <td>Social Security Number:</td>
                      <td>' . $row["Essn"] . '</td>
                    </tr>
                    <tr>
                      <td>Date of Birth:</td>
                      <td>' . $row["Edob"] . '</td>
                    </tr>
                    <tr>
                      <td>Gender:</td>
                      <td>' . $row["Egender"] . '</td>
                    </tr>
                    <tr>
                      <td>Position:</td>
                      <td>' . $row["Eposition"] . '</td>
                    </tr>
                    <tr>
                      <td>Salary:</td>
                      <td>' . $row["Esalary"] . '</td>
                    </tr>
                  </tbody>
                </table>
                <a href="employees.php" class="btn btn-secondary mt-3">Back to Employee List</a>
                </div>';
        } else {
            echo "<p>No employee found with this ID</p>";
        }
    } else {
        echo "<p>Employee ID not specified</p>";
    }
    $conn->close();
    ?>
  </div>
</body>
</html>