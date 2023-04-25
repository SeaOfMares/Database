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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New License</title>
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
        <h1 class="text-center mb-5">Register New License</h1>

        <?php
        require_once('config.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $company_id = $_POST['company_id'];
            $agent_id = $_POST['agent_id'];
            $activity_name = $_POST['activity_name'];

             // Find the highest Ccompanyid and increment it by 1
            $query_max_id = "SELECT MAX(Llicenseid) AS max_id FROM license;";
            $result_max_id = $conn->query($query_max_id);
            $row_max_id = $result_max_id->fetch_assoc();
            $new_id = $row_max_id['max_id'] + 1;

            // Check if company and agent ID exist in the database
            $sql = "SELECT * FROM company WHERE Ccompanyid = $company_id";
            $result = $conn->query($sql);

            if ($result->num_rows == 0) {
                echo '<div class="alert alert-danger" role="alert">Invalid Company ID. Please choose a valid company.</div>';
            } else {
                $sql = "SELECT * FROM employee WHERE Eemployeeid = $agent_id";
                $result = $conn->query($sql);

                if ($result->num_rows == 0) {
                    echo '<div class="alert alert-danger" role="alert">Invalid Agent ID. Please choose a valid agent.</div>';
                } else {
                    // Insert the new license into the database
                    $sql = "INSERT INTO license (Llicenseid, Lissuedate, Lexpirationdate, Lstatus, Lagentid, Ccompanyid)
                            VALUES ($new_id, CURRENT_DATE, DATE_ADD(CURRENT_DATE, INTERVAL 1 YEAR), 'in process', $agent_id, $company_id)";

                    if ($conn->query($sql) === TRUE) {
                        echo '<div class="alert alert-success" role="alert">License registered successfully</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Error registering license: ' . $conn->error . '</div>';
                    }
                }
            }
        }
        ?>

<form method="POST">
    <div class="mb-3">
        <label for="company_id" class="form-label">Company</label>
        <select class="form-select" name="company_id" required>
            <option value="">Choose a company</option>
            <?php
            $sql = "SELECT * FROM company";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['Ccompanyid']."'>".$row['Cname']."</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="agent_id" class="form-label">Agent</label>
        <select class="form-select" name="agent_id" required>
            <option value="">Choose an agent</option>
            <?php
            $sql = "SELECT * FROM employee";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['Eemployeeid']."'>".$row['Ename']."</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="activity_name" class="form-label">Activity</label>
        <select class="form-select" name="activity_name" required onchange="updatePrice()">
            <option value="">Choose an activity</option>
            <?php
            $sql = "SELECT * FROM activity";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['Aname']."' data-cost='".$row['Acost']."'>".$row['Aname']."</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="num_employees" class="form-label">Number of Employees</label>
        <input type="number" class="form-control" name="num_employees" required onchange="updatePrice()">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" id="price" readonly>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>

<script>
function updatePrice() {
    var activitySelect = document.getElementsByName("activity_name")[0];
    var numEmployeesInput = document.getElementsByName("num_employees")[0];
    var priceInput = document.getElementsByName("price")[0];

    if (activitySelect.selectedIndex > 0 && numEmployeesInput.value > 0) {
        var activityCost = parseFloat(activitySelect.options[activitySelect.selectedIndex].getAttribute("data-cost"));
        var numEmployees = parseInt(numEmployeesInput.value);
        var totalPrice = activityCost * numEmployees;
        priceInput.value = totalPrice.toFixed(2);
    } else {
        priceInput.value = "";
    }
}
</script>