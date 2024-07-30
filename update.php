<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .user {
            background-color: black;
            padding: 10px;
            color: bisque;
            text-align: center;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    include "connect.php";

    $rows = [];
    $id = '';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sqli = "SELECT * FROM user_data WHERE id = $id";
        $result = $connection->query($sqli);

        if ($result->num_rows > 0) {
            $rows = $result->fetch_assoc();
        }
    }

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $mysqli = "UPDATE user_data SET name = '$name', email = '$email', password = '$password' WHERE id = $id";

        if (mysqli_query($connection, $mysqli)) {
            echo "<div class='alert alert-success' role='alert'>Data is Updated!</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Data is Not Updated!</div>";
        }
    }
    ?>

    <form name="myForm" method="post">
        <h2 class="user">User Information</h2>
        <hr><br>
        <div class="form-group">
            <label>User ID</label>
            <input type="text" name="id" class="form-control" value="<?php echo isset($rows['id']) ? $rows['id'] : ''; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Enter the Username</label>
            <input type="text" name="name" class="form-control" value="<?php echo isset($rows['name']) ? $rows['name'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label>Enter the Email ID</label>
            <input type="text" name="email" class="form-control" value="<?php echo isset($rows['email']) ? $rows['email'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label>Enter the Password</label>
            <input type="text" name="password" class="form-control" value="<?php echo isset($rows['password']) ? $rows['password'] : ''; ?>" required>
        </div>
        <div class="form-group text-center">
            <input type="submit" name="submit" class="btn btn-success" value="Update">
        </div>
        <hr>
        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Insert</a>
            <a href="delete.php" class="btn btn-danger">Delete</a>
            <a href="select.php" class="btn btn-info">Users</a>
        </div>
    </form>
</div>

</body>
</html>
