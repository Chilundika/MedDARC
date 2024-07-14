<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PACS</title>
  <link rel="apple-touch-icon" sizes="180x180" href="Resource/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Resource/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Resource/favicon/favicon-16x16.png">
  <link rel="manifest" href="Resource/favicon/site.webmanifest">
  <link rel="stylesheet" type="text/css" href="css/styles2.css">	
  <style>
    body {
      padding: 0px;
      flex-grow: 1; /* Ensure main section grows to fill available space */
      background-color: gray;
      background-size: 1550px 650px; /* Adjust the size as needed */
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
    }
    .image-container {
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      width: 100%;
      height: 443px;
    }
    .image-container img {
      display: block;
    }
    .overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 100%;
    }
    .overlay form {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
    }
    .overlay form h1, 
    .overlay form label {
      color: black;
    }
    .overlay form input[type="text"],
    .overlay form input[type="password"] {
      margin-bottom: 10px;
      padding: 5px;
      width: 95%;
    }
    .overlay form input[type="submit"] {
      background-color: green;
      color: white;
      padding: 10px;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
<header style="display: flex; align-items: center;">
  <img src="Resource/logo.png" alt="logo" width="50px" height="50px">
  <h1 style="margin-left: 10px; font-size: 20px;">MedDARC</h1>
  <div class="navigation-bar" style="margin-left: auto;">
    <nav>
      <ul>
        <li><a href='index.php'>Exit</a></li>
      </ul>
    </nav>
  </div>
</header>

<main>
<section>    
<?php
    session_start();
    if(isset($_SESSION["userID"]) && $_SESSION["uc"]=="1")
    {
      echo "<a href='logout.php'>Logout</a>
      <a href='pdashboard.php'>Profile </a>
      <a href='index.php'> Home</a>";
    }
    elseif (isset($_SESSION["userID"]) && $_SESSION["uc"]=="2") {
      echo "<a href='logout.php'>Logout</a>
      <a href='ddashboard.php'>Profile </a>
      <a href='index.php'> Home</a>";
    }
    elseif (isset($_SESSION["userID"]) && $_SESSION["uc"]=="3") {
      echo "<a href='logout.php'>Logout</a>
      <a href='sdashboard.php'>Profile </a>
      <a href='index.php'> Home</a>";
    }
    else {
      echo " <div class='dropdown'>
 ";
    }
   ?>
   <section style="position: relative; text-align: center;">
    <h1 class="blue-heading" style="font-size: 20px; color: aliceblue;text-align:center;">ARCHIVING SYSTEM</h1>
    <hr>
    <h2 style="text-align: center; color: aliceblue;">Archive your files effectively</h2>
    <div class="image-container">
      <img src="Resource/b1.jpg" alt="background photo" width="1900px" height="443px">
      <div class="overlay">
      <form action="login_process.php" method="post">
        <h1>LOGIN</h1>
        <label for="username">Username</label>
        <input type="text" name="username" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
      </form>
      </div>
    </div>
   </section>
</section>
</main>
<footer>
  <p>&copy; DeZign-BluPrint ZM @ 2024</p><br>
</footer>
</body>
</html>
