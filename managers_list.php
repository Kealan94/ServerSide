<?php
    require_once('database.php');
    // Get all managers
    $query = 'SELECT * FROM managers
              ORDER BY managerID';
    $statement = $db->prepare($query);
    $statement->execute();
    $managers = $statement->fetchAll();
    $statement->closeCursor();
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Edit a Record</title>
    <link rel="stylesheet" type="text/css" href="./sass/main.css">
</head>
<!-- the body section -->
<body>
    <header><h1>Add a Manager</h1></header>
    <main>
    <h1>Managers</h1>
    <table>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <!-- Retrieve data as an associative array and output as a foreach loop  -->
        <?php foreach ($managers as $manager) : ?>
        <tr>
            <td><?php echo $manager['managerName']; ?></td>
            <td>
                <form action="delete_manager.php" method="post"
                      id="delete_record_form">
                    <input type="hidden" name="manager_id"
                           value="<?php echo $manager['managerID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <h2>Add a Manager here</h2>
    <form action="add_manager.php" method="post"
          id="add_manager_form">
        <label>Name:</label>
        <input type="input" name="name" required>
        <input id="add_manager_button" type="submit" value="Add">
    </form>
    <br>
    <p><a href="index.php">Homepage</a></p>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Football.</p>
    </footer>
</body>
</html>