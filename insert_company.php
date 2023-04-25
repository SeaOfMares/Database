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
<?php
require_once('config.php');

$company_name = $_POST['company_name'];
$num_employees = $_POST['num_employees'];
$owner_id = $_POST['owner_id'];
$location_status = $_POST['location_status'];

// Check if the owner id already exists in the database
$query_check_owner_id = "SELECT COUNT(*) AS count FROM company WHERE Oownerid = $owner_id";
$result_check_owner_id = $conn->query($query_check_owner_id);
$row_check_owner_id = $result_check_owner_id->fetch_assoc();
$count_owner_id = $row_check_owner_id['count'];

if ($count_owner_id > 0) {
    echo "<script>alert('Owner ID already exists. Please enter a different ID.')</script>";
} else {
    // Find the highest Ccompanyid and increment it by 1
    $query_max_id = "SELECT MAX(Ccompanyid) AS max_id FROM company;";
    $result_max_id = $conn->query($query_max_id);
    $row_max_id = $result_max_id->fetch_assoc();
    $new_id = $row_max_id['max_id'] + 1;

    $sql = "INSERT INTO company (Ccompanyid, Cname, Cnumemployees, Oownerid, Clocation_status) VALUES ($new_id, '$company_name', $num_employees, $owner_id, '$location_status');";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "<script>window.location.href='add_company.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>