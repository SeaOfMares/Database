
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
$company_id = 1; // Replace with the actual company_id you want to update
$new_num_employees = 50; // Replace with the new number of employees

$sql = "CALL UpdateNumEmployees($company_id, $new_num_employees)";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Number of employees updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}