<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<style>
.user {
    background-color: black;
    padding: 10px;
    color: bisque;
}
</style>

<?php
$message = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $connection = new mysqli('localhost', 'root', '', 'crud_php_db');

    if ($connection) {
        // Connection is successfully established
    }

    $sqli = "INSERT INTO user_data (name, email, password) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($connection, $sqli)) {
        $message = '<div class="alert alert-success" role="alert">Record Inserted Successfully!</div>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">Record Not Inserted Successfully!</div>';
    }
}
?>

<div class="container mt-5">
    <form name="myForm" method="post" class="form-group">
        <h2 class="user text-center">User Information</h2>
        <hr><br>
        
        <?php echo $message; ?>

        <div class="form-group">
            <label>Enter the Username</label>
            <input type="text" name="name" class="form-control form-control-lg" required>
        </div>

        <div class="form-group">
            <label>Enter the Email ID</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Enter the Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group text-center">
            <input type="submit" name="submit" class="btn btn-success">
        </div>
    </form>

    <div class="text-center">
        <a href="update.php" class="btn btn-info">Update</a> &nbsp; &nbsp;
        <a href="delete.php" class="btn btn-danger">Delete</a> &nbsp; &nbsp;
        <a href="select.php" class="btn btn-secondary">Users</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9AK/1LXN5+CQf1pSh1vX4ylCgxsKlf0PR6jF9" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
