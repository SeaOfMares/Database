$company_id = 1; // Replace with the actual company_id you want to update
$new_num_employees = 50; // Replace with the new number of employees

$sql = "CALL UpdateNumEmployees($company_id, $new_num_employees)";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Number of employees updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}