<?php
// Get ID
$manager_id = filter_input(INPUT_POST, 'manager_id', FILTER_VALIDATE_INT);
// Validate inputs
if ($manager_id == null || $manager_id == false) {
    $error = "Invalid manager ID.";
    include('error.php');
} else {
    require_once('database.php');
    // Delete the records from the database  
    $query = 'DELETE FROM managers 
              WHERE managerID = :manager_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':manager_id', $manager_id);
    $statement->execute();
    $statement->closeCursor();
    // Display the manager List page
    include('managers_list.php');
}
?>
