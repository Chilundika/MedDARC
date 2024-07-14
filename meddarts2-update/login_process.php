<?php
session_start();

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

// Get the submitted username and password
$submitted_username = $_POST['username'];
$submitted_password = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
$stmt->bind_param("s", $submitted_username);
$stmt->execute();
$stmt->store_result();

// Check if username exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    
    // Verify the password
    if (password_verify($submitted_password, $hashed_password)) {
        // Credentials are correct
        $_SESSION['username'] = $submitted_username;
        header("Location: xrayfiles.php");
        exit();
    } else {
        // Incorrect password
        echo "<script>alert('Invalid username or password. Please try again.'); window.location.href='pacs.php';</script>";
        exit();
    }
} else {
    // Username does not exist
    echo "<script>alert('Invalid username or password. Please try again.'); window.location.href='pacs.php';</script>";
    exit();
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
