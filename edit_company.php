<?php
require_once('config.php');

if (!empty($_POST)) {
    $company_id = $_POST['company_id'];
    $company_name = $_POST['company_name'];
    $num_employees = $_POST['num_employees'];
    $owner_id = $_POST['owner_id'];
    $location_status = $_POST['location_status'];

    $sql = "UPDATE company SET Cname='$company_name', Cnumemployees=$num_employees, Clocation_status='$location_status' WHERE Ccompanyid=$company_id;";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: list_companies.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    if (isset($_GET['company_id'])) {
        $company_id = $_GET['company_id'];
        $sql = "SELECT * FROM company WHERE Ccompanyid=$company_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $company_name = $row['Cname'];
                $num_employees = $row['Cnumemployees'];
                $owner_id = $row['Oownerid'];
                $location_status = $row['Clocation_status'];
            }
        }
    } else {
        header("Location: list_companies.php");
    }
}

?>
