<?php
// Get the managers data
$name = $name = filter_input(INPUT_POST, 'name');
// Validate inputs
if ($name == null) {
    $error = "Invalid managers data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');
    // Add the record to the database
    $query = "INSERT INTO managers (managerName)
              VALUES (:name)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
    // Display the managers List page
    include('managers_list.php');
}
?>