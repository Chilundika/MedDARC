<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> ADMIN PANEL </title>
  <link rel="apple-touch-icon" sizes="180x180" href="Resource/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Resource/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Resource/favicon/favicon-16x16.png">
  <link rel="manifest" href="Resource/favicon/site.webmanifest">
 <link rel="stylesheet" type="text/css" href="css/styles.css">

  <style>
body {
    padding: 0px;
    flex-grow: 1; /* Ensure main section grows to fill available space */
    background-image: url("Resource/Medz1.jpg");
    background-size: 1550px 650px; /* Adjust the size as needed */; /* Adjust the size as needed */
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
}
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 30px;
    background-color: #333;
    color: #fff;
    width: 100%;
    box-sizing: border-box;
    white-space: nowrap;
}

header h1 {
    margin: 0px;
    font-size: 12px;
    align-items: end;
    
}

.nav-container {
    display: flex;
    align-items: center;
    width: 100%;
    justify-content: space-between;
}

header nav {
    margin-left: auto;
}

header nav ul {
    list-style: none;
    display: flex;
    align-items: center;
    margin: 0;
    padding: 0;
}

header nav ul li {
    margin-left: 20px;
}

header nav ul li a {
    color: #fff;
    text-decoration: none;
}
table {
    width: 100%;
    height: 150px;
    border-collapse: collapse;
    margin: 20px 0px;
    text-align: center;
}

table th, table td {
    padding: 20px;
    border: 1px solid #ccc;
    text-align: left;
}

table th {
    background: #fff;
    color: #fff;
}

table tr:nth-child(even) {
    background: #f4f4f4;
}
</style>

</head>
<body>
<header style="display: flex; align-items: center;">
  <img src="Resource/logo.png" alt="logo" width="50px" height="50px">
  <h1 style="margin-left: 10px; font-size:20px">MedDARC_ADMIN PANEL</h1>
  <div class="navigation-bar" style="margin-left: auto;">
      <nav>
        <ul>
          <li><a href="admin_panel.php" >Home</a></li>
            <li><a class='logout' href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
</header>
<?php
 session_start();
 if(!$_SESSION["userID"])
 {
   header("Location:admin.login.php?signin");
 }
 ?>
<main>
<section><br><br><br>
<h2 style="text-align: center;color: red; font-size: 20px;">AMDIN HANDLE</h2>
<hr>
        <table>
                <tr>
                    <th><a href="aregister.php" style="color: #007bff; text-decoration: none; padding: 10px 20px; background-color: #333; color: #fff; border-radius: 5px; text-align: center;">Register</a></th>
                    <th><a href="adelete.php" style="color: #007bff; text-decoration: none; padding: 10px 20px; background-color: #333; color: #fff; border-radius: 5px; text-align: center;">Delete</a></th>
                </tr>
        </table>
</section>
  </main><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <footer>
    <p>&copy; DeZign-BluPrint ZM @2024</p> 
</footer>
</body>
</html>



