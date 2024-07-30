<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete | User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .message {
            margin-top: 20px;
            text-align: center;
        }
        .actions {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    include 'connect.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sqli = "DELETE FROM user_data WHERE id = $id";

        if ($connection->query($sqli) === TRUE) {
            echo "<div class='alert alert-success message'>Record Deleted Successfully!</div>";
        } else {
            echo "<div class='alert alert-danger message'>Record is Not Deleted!</div>";
        }

        $connection->close();
    }
    ?>
    <div class="actions">
        <a href="index.php" class="btn btn-primary">Insert</a>
        <a href="select.php" class="btn btn-info">Users</a>
    </div>
</div>

</body>
</html>
