<?php
require_once('config.php');

if (isset($_GET['id'])) {
    $company_id = $_GET['id'];

    $sql = "DELETE FROM company WHERE Ccompanyid=$company_id";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: list_companies.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>