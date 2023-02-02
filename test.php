<?php

// 1. Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'test');

// 2. Check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 3. Validate form data
$name = $_POST['name'];
$email = $_POST['email'];

// 4. Display form data for debugging
echo "Name: " . $name . "<br>";
echo "Email: " . $email . "<br>";

// 5. Write the INSERT query
$stmt = mysqli_prepare($conn, "INSERT INTO map (name, email) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $name, $email);

// 6. Execute the query
if (mysqli_stmt_execute($stmt)) {
    echo "Record added successfully";
} else {
    // 7. Check for errors
    echo "Error: " . mysqli_stmt_error($stmt);
}

// 8. Close the prepared statement
mysqli_stmt_close($stmt);

// 9. Close the connection
mysqli_close($conn);

?>
