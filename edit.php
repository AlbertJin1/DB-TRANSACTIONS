<!DOCTYPE html>
<html>

<head>
    <title>Edit Employee</title>
</head>

<body>
    <?php
    $id = $_GET['id'];

    $sql = "SELECT * FROM employees WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    ?>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
            <input type="text" name="age" value="<?php echo $row['age']; ?>" required><br>
            <input type="text" name="salary" value="<?php echo $row['salary']; ?>" required><br>
            <button type="submit" name="update">Update</button>
        </form>

    <?php
    } else {
        echo "No record found.";
    }
    ?>
</body>

</html>