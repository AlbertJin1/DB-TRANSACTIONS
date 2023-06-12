<!DOCTYPE html>
<html>

<head>
    <title>Payroll System</title>
</head>

<body>
    <?php
    // Database connection
    $conn = mysqli_connect("localhost", "username", "password", "database_name");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Function to validate the fields
    function validateFields($data)
    {
        // Add your field validations here
        $validatedData = array();
        $validatedData['name'] = $data['name']; // Assuming name is a required field
        $validatedData['age'] = intval($data['age']); // Converting age to integer

        return $validatedData;
    }

    // Create record
    if (isset($_POST['create'])) {
        $validatedData = validateFields($_POST);

        $id = $_POST['id'];
        $name = $validatedData['name'];
        $age = $validatedData['age'];
        $salary = floatval($_POST['salary']); // Converting salary to float

        $sql = "INSERT INTO employees (id, name, age, salary) VALUES ('$id', '$name', '$age', '$salary')";
        if (mysqli_query($conn, $sql)) {
            echo "Record created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Update record
    if (isset($_POST['update'])) {
        $validatedData = validateFields($_POST);

        $id = $_POST['id'];
        $name = $validatedData['name'];
        $age = $validatedData['age'];
        $salary = floatval($_POST['salary']); // Converting salary to float

        $sql = "UPDATE employees SET name='$name', age='$age', salary='$salary' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Delete record
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $sql = "DELETE FROM employees WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Retrieve records
    $sql = "SELECT * FROM employees";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['age'] . "</td>
                    <td>" . $row['salary'] . "</td>
                    <td>
                        <a href='edit.php?id=" . $row['id'] . "'>Edit</a>
                        <a href='index.php?delete=" . $row['id'] . "'>Delete</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }

    mysqli_close($conn);
    ?>
    <br>
    <form method="POST">
        <input type="text" name="id" placeholder="ID" required><br>
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="text" name="age" placeholder="Age" required><br>
        <input type="text" name="salary" placeholder="Salary" required><br>
        <button type="submit" name="create">Create</button>
    </form>
</body>

</html>