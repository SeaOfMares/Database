<?php
require_once('config.php');
// check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // retrieve application ID and status from form submission
  $appid = $_POST["appid"];
  $status = $_POST["status"];

  // check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // update application status in database
  $sql = "UPDATE application SET APstatus='$status' WHERE APappid='$appid'";
  if ($conn->query($sql) === TRUE) {
    // redirect back to index.php with success status
    header("Location: applications.php?status=updated");
    exit();
  } else {
    // redirect back to index.php with error status
    header("Location: applications.php?status=error");
    exit();
  }

  // close database connection
  $conn->close();
}
?>