<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN LOGIN</title>
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
form {
    width: 100%;
    max-width: 400px;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    display: flex;
    flex-direction: column;

}
</style>
</head>
<body>
<header style="display: flex; align-items: center;">
  <img src="Resource/logo.png" alt="logo" width="50px" height="50px">
  <h1 style="margin-left: 10px;">MedDARC_ADMIN LOGIN</h1>
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
          <li><a href='index.php'>Home</a></li>
          <li><a href="https://dezignbluprinttech.wixsite.com/design-blueprint">Contact us</a></li>
          <!--li><a href='pacs.php'>PACS</a></li-->
        </ul>
      </nav>
    </div>
  </header>
 <main>
  <section><br><br><br><br><br>
  <div class="login_box">
  <form class="login_form" action="admin_login.process.php" method="post" style="display: flex; flex-direction: column; align-items: center;">
  <img src="Resource/logo.png" alt="admin logo" width="50px" height="50px">
  <h2 style="text-align: center;">Sign In</h2>
  <label for="userID">User ID</label>
  <input type="text" name="userID" placeholder="Enter ID" required>
  <label for="pass">Password</label>
  <input type="password" name="pass" placeholder="Enter your Password" required>
  <input type="submit" name="login-submit" value="Login">
  </form>

  </div>
  </section>
  <section>
  <?php
        session_start();
        if (isset($_SESSION["userID"]) && $_SESSION["uc"]=="3") {
          header("Location:sdashboard.php");
        }
?>
      <?php
       if(isset($_GET["error"]))
      {
        if ($_GET["error"]=="emptyfields") {
          echo "<p class=login_error>Fill in all the fields</p>";
        }
        else if ($_GET["error"]=="wrongpass") {
          echo "<p class=login_error>Password does not match</p>";
        }
        else if ($_GET["error"]=="nouser") {
         echo "<p class=login_error>No User Found!</p>";
        }
      }
      else if (isset($_GET["login"])) {
         if ($_GET["login"]=="success") {
         echo "<p class=login_success>Login Succesful!</p>";
           }
      }
      ?>
    </section>
    </main><br><br><br><br><br><br>
    <footer>
  <p>&copy; DeZign-BluPrint ZM @ 2024</p>
 </footer>
</body>
</html>
