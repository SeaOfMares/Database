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

<?php
require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $license_id = $_POST["license_id"];
  $status = $_POST["status"];

  $sql = "UPDATE license SET Lstatus='$status' WHERE Llicenseid='$license_id'";

  if ($conn->query($sql) === TRUE) {
    echo '<div class="alert alert-success" role="alert">License updated successfully</div>';
  } else {
    echo '<div class="alert alert-danger" role="alert">Error updating license: ' . $conn->error . '</div>';
  }
}

if (isset($_GET['id'])) {
  $license_id = $_GET['id'];
  $sql = "SELECT * FROM license WHERE Llicenseid='$license_id'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
  } else {
    echo '<div class="alert alert-danger" role="alert">Error: License not found.</div>';
    exit;
  }
} else {
  echo '<div class="alert alert-danger" role="alert">Error: License ID not provided.</div>';
  exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit License</title>
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
    <h1 class="text-center mb-5">Edit License</h1>
    <form method="POST">
      <div class="mb-3">
        <label for="license_id" class="form-label">License ID</label>
        <input type="text" class="form-control" id="license_id" name="license_id" value="<?php echo $row['Llicenseid']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-control" id="status" name="status">
          <option value="in process" <?php if($row['Lstatus'] == 'In process') echo 'selected'; ?>>In Process</option>
          <option value="approved" <?php if($row['Lstatus'] == 'Approved') echo 'selected'; ?>>Approved</option>
          <option value="canceled" <?php if($row['Lstatus'] == 'Canceled') echo 'selected'; ?>>Canceled</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Update License</button>
      <button type="button" class="btn btn-secondary" onclick="window.history.back()">Go Back</button>
    </form>
  </div>
</body>
</html>