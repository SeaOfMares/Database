<!--
/**
* CS 4342 Database Management
* @author Instruction team Fall 2021 with contribution from L. Garnica
* @version 2.0
* Description: The purpose of these file is to provide PHP basic elements for an
interface to access a DB.
* Resources: https://getbootstrap.com/docs/4.5/components/alerts/ -- bootstrap
examples
* Modified by: David Mares
*/
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Company</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
     body:before {
  content: "";
  display: block;
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  background-image: url("https://i.imgur.com/oS6NBVZ.jpeg");
  background-repeat: no-repeat;
  background-size: cover;
  
}

/* adjust the color and size of the text as needed */
body {
  color: #fff;
  font-family: Arial, sans-serif;
  font-size: 16px;
}
    table {
  background-color: #FFFFFF;
}
  </style>
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
                <label for="owner_name">Owner Name:</label>
                <input type="text" class="form-control" id="owner_name" name="owner_name" required>
            </div>
            <div class="form-group">
                <label for="owner_gender">Owner Gender:</label>
                <input type="text" class="form-control" id="owner_gender" name="owner_gender" required>
            </div>
            <div class="form-group">
                <label for="owner_dob">Owner Date Of Birth:</label>
                <input type="text" class="form-control" id="owner_dob" name="owner_dob" required>
            </div>
            <div class="form-group">
                <label for="owner_email">Owner Email:</label>
                <input type="text" class="form-control" id="owner_email" name="owner_email" required>
            </div>
            <div class="form-group">
                <label for="owner_ha">Owner Address:</label>
                <input type="text" class="form-control" id="owner_ha" name="owner_ha" required>
            </div>
            <div class="form-group">
                <label for="owner_phone">Owner Phone Number:</label>
                <input type="text" class="form-control" id="owner_phone" name="owner_phone" required>
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