<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Companies</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>List of Companies</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Company ID</th>
          <th>Name</th>
          <th>Number of Employees</th>
          <th>Owner ID</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once('config.php');

        $sql = "SELECT * FROM company";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["Ccompanyid"]."</td>
                    <td>".$row["Cname"]."</td>
                    <td>".$row["Cnumemployees"]."</td>
                    <td>".$row["Oownerid"]."</td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='4'>No companies found</td></tr>";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>