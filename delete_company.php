<?php
require_once('config.php');

if (isset($_POST['company_id'])) {
    $company_id = $_POST['company_id'];

    $sql = "DELETE FROM company WHERE Ccompanyid=$company_id";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: list_companies.php?status=deleted");
        exit;
    } else {
        header("Location: list_companies.php?status=error");
        exit;
    }
}

$conn->close();
?>