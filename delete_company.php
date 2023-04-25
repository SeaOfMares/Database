<!--
/**
* CS 4342 Database Management
* @author Instruction team Fall 2021 with contribution from L. Garnica
* @version 2.0
* Description: The purpose of these file is to provide PHP basic elements for an
interface to access a DB.
* Resources: https://getbootstrap.com/docs/4.5/components/alerts/ -- bootstrap
examples
* Modified by: Ruben Carmona
*/
-->
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