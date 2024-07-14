<!DOCTYPE html>
<html>
<head>
      
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> PATIENT RESET PANEL </title>

  <link rel="apple-touch-icon" sizes="180x180" href="Resource/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Resource/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Resource/favicon/favicon-16x16.png">
  <link rel="manifest" href="Resource/favicon/site.webmanifest">
  <link rel="stylesheet" type="text/css" href="css/styles2.css">
  
</head>
<body>
<header style="display: flex; align-items: center;">
  <img src="Resource/logo.png" alt="logo" width="50px" height="50px">
  <h1 style="margin-left: 10px;font-size:20px">MedDARC</h1>
  <div class="navigation-bar" style="margin-left: auto;">
    <nav>
      <ul>
      <li><a href="pdashboard.php" >Home</a></li>
      <li><a href="precords.php">Records</a></li>
      <li><a href="psearch.php">Search</a></li>
      <li><a class='logout' href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </div>
</header>
<main>
  <section>
     <div class='welcome'><h2 class='welcome_mssg'> Reset Password </h2></div>

     <div class="wrapper">
       <div class="container">
         <form class="ci_edit_form" action="p_res_pass.php" method="post">


            <input type="password" name="cp" placeholder="Current Password" required><br>


            <input type="text" name="np" placeholder="New Password" required><br>


            <input type="text" name="npr" placeholder="Re-enter Password" required><br>

            <input type="submit" name="info-submit" value="Save" style="background-color: lightgreen;">
         </form>
       </div>
     </div>

     <?php
  session_start();
  if(!$_SESSION["userID"])
  header("Location:patient.login.php")
 ?>
     <?php
      require "connection.php";
      if(isset($_POST["info-submit"]))
      {
        if (!empty($_POST["cp"]) && !empty($_POST["np"]) && !empty($_POST["npr"])) {
            $uid=$_SESSION["userID"];
            $cp=$_POST["cp"]; $np=$_POST["np"]; $npr=$_POST["npr"];

            $sql="SELECT pass FROM patient_login WHERE p_ssn = '$uid'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            if($cp == $row["pass"]){
              if ($np == $npr) {
                $sql="UPDATE patient_login SET pass= '$np' WHERE p_ssn='$uid'";
                $is_updated=mysqli_query($conn,$sql);
                if($is_updated){
                  echo "<p class='alert'>Password Updated Successfully</p>";

                }
                else {
                  header("Location:p_res_pass.php?Error");
                  exit();
                }
            }
            else {
              echo "<p class='alert'>Please Enter Same Password</p>";
            }
            }
            else {
              echo "<p class='alert'>Current Password Does Not Match</p>";
            }
        }
    }
      ?>
</section>
</main><br><br><br><br><br><br><br><br><br>
<footer>
  <p>&copy; DeZign-BluPrint ZM @ 2024</p><br>
</footer>
   </body>
 </html>
