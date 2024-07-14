<?php
// Database credentials
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "test_project";

// Create connection
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $table_sql)) {
    echo "Table 'users' created successfully.<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

// Insert user
$username = "admin";
$password = "admin";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$insert_sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($insert_sql);
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    echo "User 'admin' inserted successfully.<br>";
} else {
    echo "Error inserting user: " . $stmt->error . "<br>";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
