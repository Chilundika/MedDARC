<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to MedDARTS</title>
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
</style>
</head>
<body>
<header style="display: flex; align-items: center;">
  <img src="Resource/logo.png" alt="logo" width="50px" height="50px">
  <h1 style="margin-left: 10px;">MedDARC</h1>
  <div class="navigation-bar" style="margin-left: auto;">
    <nav>
      <ul>
        <li class="dropdown">
          <button class='dropbtn'>Login <i class='fa fa-caret-down'></i></button>
          <div class='dropdown-content'>
            <a href='patient.login.php'>Patient Login</a>
            <a href='doctor.login.php'>Doctor Login</a>
            <a href='staff.login.php'>Staff Login</a>
            <a href='join.php'>Admin Login</a>
          </div>
        </li>
        <!--li><a href='index.php'>Home</a></li--> <!--I have disabled this button because I do not want it to appear on the landing page-->
        <li><a href="https://dezignbluprinttech.wixsite.com/design-blueprint">Contact us</a></li>
        <!--li><a href='pacs.php'>PACS</a></li--> <!--I have disabled this button because I do not want it to appear on this header-->
      </ul>
    </nav>
  </div>
</header>

  <main>
  <?php
    session_start();
    if (isset($_SESSION["userID"])) {
      switch ($_SESSION["uc"]) {
        case "1":
          echo "<a href='logout.php'>Logout</a><a href='pdashboard.php'>Profile</a><a href='index.php'>Home</a>";
          break;
        case "2":
          echo "<a href='logout.php'>Logout</a><a href='ddashboard.php'>Profile</a><a href='index.php'>Home</a>";
          break;
        case "3":
          echo "<a href='logout.php'>Logout</a><a href='sdashboard.php'>Profile</a><a href='index.php'>Home</a>";
          break;
      }
    } else {
      echo "<div class='dropdown'></div>";
    }
  ?>
  
  <div class="container">
    <h1 style="text-align: center; color:#007bff">MedDARC</h1>
    <h4>(Medical Data Archiving System)</h4>
    <hr>
    <img src="Resource/Med1.png" alt="home page img" width="400px" height="250px">
  </div><br>
  <section>
            <div style="display: flex; align-items: center; justify-content: center;">
                <p style="margin: 0; margin-right: 10px;"></p>
                <a href="pacs.php" style="color: #007bff; text-decoration: none; padding: 10px 20px; background-color: #333; color: #fff; border-radius: 5px; text-align: center;">ARCHIVE</a>
            </div>
 </section>
</main><br><br>
  <footer>
    <p>&copy; DeZign-BluPrint ZM @2024</p><br> 
  </footer>
</body>
</html>
