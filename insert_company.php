<?php
require_once('config.php');

$company_name = $_POST['company_name'];
$num_employees = $_POST['num_employees'];
$owner_id = $_POST['owner_id'];
$location_status = $_POST['location_status'];

// Find the highest Ccompanyid and increment it by 1
$query_max_id = "SELECT MAX(Ccompanyid) AS max_id FROM company;";
$result_max_id = $conn->query($query_max_id);
$row_max_id = $result_max_id->fetch_assoc();
$new_id = $row_max_id['max_id'] + 1;

$sql = "INSERT INTO company (Ccompanyid, Cname, Cnumemployees, Oownerid, Clocation_status) VALUES ($new_id, '$company_name', $num_employees, $owner_id, '$location_status');";
$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: list_companies.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>