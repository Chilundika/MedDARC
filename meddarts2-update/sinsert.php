<!DOCTYPE html>
<html>
<head>
      
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> STAFF RECORDS </title>

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
      <li><a href="sdashboard.php" >Home</a></li>
      <li><a href="srecords.php">Records</a></li>
      <li><a href="sinsert.php">Insert</a></li>
      <li><a class='logout' href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </div>
</header>
<main>
<section>

<?php
 session_start();
 if(!$_SESSION["userID"])
 {
   header("Location:staff.login.php");
 }
 ?>
   <script>
   jQuery(function($) {
       $("#date").datepicker();
   });
   </script>

   <script>
   jQuery(function($) {
       $("#time").timepicker({
         timeFormat: "hh:mm tt"
       });
   });
 </script>



   <?php
   if (isset($_GET["error"]))
    {
     if($_GET["error"]=="wronguser")
     {
       echo "<div class='welcome' style='color: #D61A3C'><h2 class='welcome_mssg'> Wrong Patient ID </h2></div>";
     }
   }
   elseif (isset($_GET["login"])) {
       if ($_GET["login"]=="success") {
         echo "<div class='welcome' style='color: #97DC21'><h2 class='welcome_mssg'> Record Saved Successfully </h2></div>";
       }
     }
   else{
     echo "<div class='welcome'><h2 class='welcome_mssg'> Medicine Dosage Form</h2></div>
<div class='input-form-box'>
 <form class='input-form' action='sinsert_con.php' method='post'>
   <label for='pssn'>Patient ID</label>
   <input type='text' name='pssn' placeholder='Enter a valid Patient ID' required><br>

   <label for='date'>Date</label>
   <input type='text' name='date' id='date' placeholder='Enter Date' required><br>


   <label for='time'>Time</label>
   <input type='text' name='time' id='time' placeholder='Enter Time' required><br>


   <label for='desc'>Description</label>
   <textarea name='desc' placeholder='Description' required ></textarea><br>

   <label for='comp'>Complications</label>
   <textarea name='comp' placeholder='Write Complications if any'></textarea><br>

   <label for='meds'>Medicines</label>
   <textarea name='meds' placeholder='Medicines if any'></textarea><br>

   <label for='allerigies'>Allergies</label>
   <textarea name='allergies' placeholder='Allergies if any'></textarea><br>

   <input type='submit' name='input-submit' value='Save' style='background-color:lightgreen;'>
 </form>

</div>";

   }
  ?>


</section>
</main>
<footer>
  <p>&copy; DeZign-BluPrint ZM @ 2024</p><br>
</footer>
</body>
</html>
