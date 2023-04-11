<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Company</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Delete Company</h1>
        <form action="delete_company.php" method="post">
            <div class="form-group">
                <label for="company_id">Select Company to Delete:</label>
                <select class="form-control" id="company_id" name="company_id" required>
                    <?php
                    require_once('config.php');
                    $sql = "SELECT Ccompanyid, Cname FROM company;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value=\"" . $row["Ccompanyid"] . "\">" . $row["Cname"] . "</option>";
                        }
                    } else {
                        echo "<option disabled>No companies available</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</body>
</html>