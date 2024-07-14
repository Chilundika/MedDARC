<!DOCTYPE html>
<html>
<head>
      
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> DR EDIT PANEL </title>

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
      <li><a href="ddashboard.php" >Home</a></li>
      <li><a href="dsearch.php">Search</a></li>
      <li><a href="dinsert.php">Insert</a></li>
      <li><a class='logout' href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </div>
</header>
<main>
  <section>
  
     <div class='welcome'><h2 class='welcome_mssg'>Contact Information Edit </h2></div>

     <div class="wrapper">
       <div class="container">
         <form class="ci_edit_form" action="doctor_info_edit.php" method="post">


            <input type="text" name="ads" placeholder="Enter New Address"><br>


            <input type="text" name="ctc" placeholder="Enter New Contact Number"><br>


            <input type="text" name="mail" placeholder="Enter New Email"><br>

            <input type="submit" name="info-submit" value="Save" style="background-color: lightgreen;">
         </form>
       </div>
     </div>

     <?php
  session_start();
  if(!$_SESSION["userID"])
  header("Location:doctor.login.php")
 ?>

     <?php
      require "connection.php";
      if(isset($_POST["info-submit"]))
      {
        if (!empty($_POST["ads"]) && !empty($_POST["ctc"]) && !empty($_POST["mail"])) {
            $uid=$_SESSION["userID"];
            $ads=$_POST["ads"]; $ctc=$_POST["ctc"]; $mail=$_POST["mail"];

            $sql="UPDATE doctor SET Address = '$ads', Contact_No = '$ctc', Email = '$mail' WHERE doctor.SSN = '$uid'";
            $is_updated=mysqli_query($conn,$sql);

            if($is_updated){
              echo "<p class='alert'>Information Updated Successfully</p>";
            }
            else {
              header("Location:doctor_info_edit.php?Error");
            }
          }
      elseif (!empty($_POST["ads"]) && !empty($_POST["ctc"]) && empty($_POST["mail"])) {
        $uid=$_SESSION["userID"];
        $ads=$_POST["ads"]; $ctc=$_POST["ctc"];

        $sql="UPDATE doctor SET Address = '$ads', Contact_No = '$ctc' WHERE doctor.SSN = '$uid'";
        $is_updated=mysqli_query($conn,$sql);

        if($is_updated){
          echo "<p class='alert'>Information Updated Successfully</p>";
        }
        else {
          header("Location:doctor_info_edit.php?Error");
        }
      }
    elseif (!empty($_POST["ads"]) && empty($_POST["ctc"]) && !empty($_POST["mail"])) {
      $uid=$_SESSION["userID"];
      $ads=$_POST["ads"];  $mail=$_POST["mail"];

      $sql="UPDATE doctor SET Address = '$ads', Email = '$mail' WHERE doctor.SSN = '$uid'";
      $is_updated=mysqli_query($conn,$sql);

      if($is_updated){
        echo "<p class='alert'>Information Updated Successfully</p>";
      }
      else {
        header("Location:doctor_info_edit.php?Error");
      }
    }
    elseif (empty($_POST["ads"]) && !empty($_POST["ctc"]) && !empty($_POST["mail"])) {
      $uid=$_SESSION["userID"];
     $ctc=$_POST["ctc"]; $mail=$_POST["mail"];

      $sql="UPDATE doctor SET Contact_No = '$ctc', Email = '$mail' WHERE doctor.SSN = '$uid'";
      $is_updated=mysqli_query($conn,$sql);

      if($is_updated){
        echo "<p class='alert'>Information Updated Successfully</p>";
      }
      else {
        header("Location:doctor_info_edit.php?Error");
      }
    }
    elseif (!empty($_POST["ads"]) && empty($_POST["ctc"]) && empty($_POST["mail"])) {
      $uid=$_SESSION["userID"];
      $ads=$_POST["ads"];

      $sql="UPDATE doctor SET Address = '$ads' WHERE doctor.SSN = '$uid'";
      $is_updated=mysqli_query($conn,$sql);

      if($is_updated){
        echo "<p class='alert'>Information Updated Successfully</p>";
      }
      else {
        header("Location:doctor_info_edit.php?Error");
      }
    }
    elseif (empty($_POST["ads"]) && !empty($_POST["ctc"]) && empty($_POST["mail"])) {
      $uid=$_SESSION["userID"];
     $ctc=$_POST["ctc"];

      $sql="UPDATE doctor SET  Contact_No = '$ctc' WHERE doctor.SSN = '$uid'";
      $is_updated=mysqli_query($conn,$sql);

      if($is_updated){
        echo "<p class='alert'>Information Updated Successfully</p>";
      }
      else {
        header("Location:doctor_info_edit.php?Error");
      }
    }

      elseif (empty($_POST["ads"]) && empty($_POST["ctc"]) && !empty($_POST["mail"])) {
        $uid=$_SESSION["userID"];
         $mail=$_POST["mail"];

        $sql="UPDATE doctor SET  Email = '$mail' WHERE doctor.SSN = '$uid'";
        $is_updated=mysqli_query($conn,$sql);

        if($is_updated){
          echo "<p class='alert'>Information Updated Successfully</p>";
        }
        else {
          header("Location:doctor_info_edit.php?Error");
        }
      }

      }
      ?>

</section>   
</main><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
  <p>&copy; DeZign-BluPrint ZM @ 2024</p><br>
</footer>   
   </body>
 </html>
