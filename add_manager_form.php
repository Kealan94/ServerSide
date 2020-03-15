<?php
require('database.php');
$query = 'SELECT *
          FROM managers
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
    <title>Add a manager</title>
    <link rel="stylesheet" type="text/css" href="./sass/main.css">
</head>
<!-- the body section -->
<body>
    <header><h1>Add a Manager</h1></header>

    <main>
        <h1>Input your own team</h1>
        <form action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">
            <label>managers:</label>
            <select name="manager_id">
            <?php foreach ($categories as $managers) : ?>
                <option value="<?php echo $managers['managerID']; ?>">
                    <?php echo $managers['managerName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>

            <label>Name:</label>
            <input type="input" name="name" required>
            <br>

            <label>Age:</label>
            <input type="input" name="age" required>
            <br>

            <label>Club:</label>
            <input type="input" name="club" required>
            <br>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>
            <label>&nbsp;</label>
            <input type="submit" value="Add Record">
            <br>
        </form>
        <p><a href="index.php">Homepage</a></p>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?>Football.</p>
    </footer>
</body>
</html>