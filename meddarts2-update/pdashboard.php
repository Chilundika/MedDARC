<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Dashboard </title>
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
      <li><a href="precords.php">Records </a></li>
      <li><a href="psearch.php">Search</a></li>
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
   header("Location:patient.login.php");
 }
 ?>
  <?php
    require "connection.php";
    $uid=$_SESSION["userID"];
    $sql="SELECT SSN, F_Name, CONCAT(F_Name,' ',L_Name) AS Full_name, Address, Contact_No, Email, Date_Format(Date_Of_Birth,'%M %D %Y') AS Date_Of_Birth, Gender, DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(Date_Of_Birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(Date_Of_Birth, '00-%m-%d')) AS age FROM patient WHERE SSN=?";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location:pdashboard.php?error=sqlerror");
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $uid);
      mysqli_stmt_execute($stmt);
      $result= mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result))
      {
        $ssn=$row["SSN"];
        $fname=strtoupper($row["F_Name"]);
        $fullname=$row["Full_name"];
        $address=$row["Address"];
        $cont=$row["Contact_No"];
        $mail=$row["Email"];
        $dob=$row["Date_Of_Birth"];
        $gen=$row["Gender"];
        $age=$row["age"];
        echo "
          <div class='welcome'><h2 class='welcome_mssg'> WELCOME $fname</h2></div>
          <hr>
          <div class='pi_box'>
            <div class='pi_table'>
            <h3> Personal Info</h3>
              <table>
                <tr>
                    <th>FULL NAME</th>
                    <td>$fullname</td>
                </tr>
                <tr>
                   <th>BIRTHDAY</th>
                   <td>$dob</td>
                </tr>
                <tr>
                    <th>AGE</th>
                    <td>$age</td>
                </tr>
                <tr>
                   <th>GENDER</th>
                   <td>$gen</td>
                </tr>
              </table>
            </div>
          </div>

          <div class='ci_box'>
            <div class='ci_table'>
            <h3> Contact Info</h3>
              <table>
                <tr><th>ADDRESS</th>
                    <td>$address</td></tr>
                <tr><th>CONTACT NO</th>
                   <td>$cont</td></tr>
                <tr><th>E-MAIL</th>
                   <td>$mail</td></tr>
              </table>
              <hr>
               <a href='patient_info_edit.php' style='color: #007bff; text-decoration: none; padding: 5px 20px; background-color: #333; color: #fff; border-radius: 5px; text-align: center;'>Edit</a>
          </div><br>
          <div class='res_div'><a class='res' href='p_res_pass.php' style='color: #007bff; text-decoration: none; padding: 8px 20px; background-color: #333; color: #fff; border-radius: 5px; text-align: center;'>Reset Password</a></div>
        ";
      }
    }
   ?>
</section>
</main>
<footer>
  <p>&copy; DeZign-BluPrint ZM @ 2024</p><br>
 </footer>
</body>
</html>