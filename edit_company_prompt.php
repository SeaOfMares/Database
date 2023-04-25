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

if (isset($_GET['company_id'])) {
    $company_id = $_GET['company_id'];

    $sql = "SELECT * FROM company WHERE Ccompanyid=$company_id;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $company_name = $row['Cname'];
        $num_employees = $row['Cnumemployees'];
        $owner_id = $row['Oownerid'];
        $location_status = $row['Clocation_status'];
    } else {
        header("Location: edit_company_page.php");
    }
} else {
    header("Location: edit_company_page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Company</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Company</h1>
        <form action="edit_company.php" method="post">
            <input type="hidden" name="company_id" value="<?= $company_id ?>">
            <div class="form-group">
                <label for="company_name">Company Name:</label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="<?= $company_name ?>" required>
            </div>
            <div class="form-group">
                <label for="num_employees">Number of Employees:</label>
                <input type="number" class="form-control" id="num_employees" name="num_employees" value="<?= $num_employees ?>" required>
            </div>
            <div class="form-group">
                    <label for="location_status">Location Status:</label>
                    <select class="form-control" id="location_status" name="location_status" required>
                        <option <?= $location_status == "rented" ? "selected" : "" ?> value="rented">Rented</option>
                        <option <?= $location_status == "owned" ? "selected" : "" ?> value="owned">Owned</option>
                    </select>
                </div>

            <button type="submit" class="btn btn-primary">Update Company</button>
        </form>
    </div>
</body>
</html>