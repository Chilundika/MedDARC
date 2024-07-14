<?php
// check if the form has been submitted
if (isset($_POST['signup-submit'])) {

  // include the database connection file
  require 'db_connection.php';

  // get the user input from the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST['password-repeat'];

  // check for empty fields
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: signup.php?error=emptyfields&username=".$username."&email=".$email);
    exit();
  }

  // check for invalid username and email
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: signup.php?error=invalidusernameemail");
    exit();
  }

  // check for invalid username
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: signup.php?error=invalidusername&email=".$email);
    exit();
  }

  // check for invalid email
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: signup.php?error=invalidemail&username=".$username);
    exit();
  }

  // check if the password and repeat password match
  else if ($password !== $passwordRepeat) {
    header("Location: signup.php?error=passwordcheck&username=".$username."&email=".$email);
    exit();
  }

  // check if the username or email already exists in the database
  else {
    $sql = "SELECT username FROM users WHERE username=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: signup.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCount = mysqli_stmt_num_rows($stmt);
      mysqli_stmt_close($stmt);

      if ($resultCount > 0) {
        header("Location: signup.php?error=usernametaken&email=".$email);
        exit();
      } else {
        $sql = "SELECT email FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: signup.php?error=sqlerror");
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "s", $email);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $resultCount = mysqli_stmt_num_rows($stmt);
          mysqli_stmt_close($stmt);

          if ($resultCount > 0) {
            header("Location: signup.php?error=emailtaken&username=".$username);
            exit();
          } else {
            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: signup.php?error=sqlerror");
              exit();
            } else {
              $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

              mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_close($stmt);

              header("Location:
