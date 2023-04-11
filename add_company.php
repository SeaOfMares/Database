<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Company</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Add Company</h1>
        <form action="insert_company.php" method="post">
            <div class="form-group">
                <label for="company_name">Company Name:</label>
                <input type="text" class="form-control" id="company_name" name="company_name" required>
            </div>
            <div class="form-group">
                <label for="num_employees">Number of Employees:</label>
                <input type="number" class="form-control" id="num_employees" name="num_employees" required>
            </div>
            <div class="form-group">
                <label for="owner_id">Owner ID:</label>
                <input type="number" class="form-control" id="owner_id" name="owner_id" required>
            </div>
            <div class="form-group">
                <label for="location_status">Location Status:</label>
                <select class="form-control" id="location_status" name="location_status" required>
                    <option value="Rented">Rented</option>
                    <option value="Owned">Owned</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>