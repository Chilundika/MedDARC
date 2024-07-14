<!DOCTYPE html>
<html>
<head>
  <link rel="apple-touch-icon" sizes="180x180" href="Resource/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Resource/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Resource/favicon/favicon-16x16.png">
  <link rel="manifest" href="Resource/favicon/site.webmanifest">
  <link rel="stylesheet" type="text/css" href="css/signup_style.css">
  <title> Signup </title>
</head>
<body>

 <div class="signup_box">
   <form class="signup_form" action="signup.process.php" method="post">
     <img src="Resource/logo.ECE.png">
     <h2>Sign Up</h2>
     <?php
      if(isset($_GET["error"]))
      {
        if ($_GET["error"]=="emptyfields") {
          echo "<p class=signup_error>Fill in all the fields</p>";
        }
        else if ($_GET["error"]=="invalidemailuid") {
          echo "<p class=signup_error>Invalid username and email</p>";
        }
        else if ($_GET["error"]=="invalidemail") {
          echo "<p class=signup_error>Invalid email</p>";
        }
        else if ($_GET["error"]=="invaliduid") {
          echo "<p class=signup_error>Invalid username</p>";
        }
        else if ($_GET["error"]=="passwordcheck") {
          echo "<p class=signup_error>Passwords do not match</p>";
        }
        else if ($_GET["error"]=="usertaken") {
          echo "<p class=signup_error>Username is already taken</p>";
        }
      }
      else if (isset($_GET["signup"])) {
         if ($_GET["signup"]=="success") {
         echo "<p class=signup_success>Signup Succesful!</p>";
           }
      }
      ?>

     <label for="uid">Username</label>
     <input type="text" name="uid" placeholder="Enter your Username">
     <label for="email">Email</label>
     <input type="text" name="email" placeholder="Enter your Email">
     <label for="pass">Password</label>
     <input type="password" name="pass" placeholder="Enter your Password">
     <label for="pass-repeat">Repeat Password</label>
     <input type="password" name="pass-repeat" placeholder="Repeat your Password">
     <input type="submit" name="signup-submit" value="Sign Up">
   </form>
 </div>

</body>
</html>
