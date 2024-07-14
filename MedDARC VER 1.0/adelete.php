<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DELETE PANEL</title>
  <link rel="apple-touch-icon" sizes="180x180" href="Resource/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Resource/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Resource/favicon/favicon-16x16.png">
  <link rel="manifest" href="Resource/favicon/site.webmanifest">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <style>
    body {
      padding: 0px;
      flex-grow: 1; /* Ensure main section grows to fill available space */
      background-color: grey;
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
    table {
      width: 150%;
      max-width: 600px;
      margin: 5px auto;
      border-collapse: collapse;
      background-color:whitesmoke;
      padding: 20px;
      border-radius: 10px;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    input[type="text"], input[type="password"], input[type="submit"] {
      width: 90%;
      padding: 6px;
      margin: 1px 0;
    }
    input[type="submit"] {
      background-color: green;
      color: white;
      border: none;
      cursor: pointer;
      width: 100%;
    }
  </style>

<script>
    function validateForm() {
      const checkboxes = document.querySelectorAll('input[name="ch"]');
      let checked = false;
      checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
          checked = true;
        }
      });
      if (!checked) {
        alert('Please select a category before proceeding.');
        return false;
      }
      return true;
    }
  </script>

</head>
<body>
<header style="display: flex; align-items: center;">
  <img src="Resource/logo.png" alt="logo" width="50px" height="50px">
  <h1 style="margin-left: 10px;">MedDARC</h1>
  <div class="navigation-bar" style="margin-left: auto;">
    <nav>
      <ul>
        <li><a href="admin_panel.php" >Home</a></li>
        <!--li><a href="aregister.php">Register</a></li-->
        <li><a href="adelete.php">Delete</a></li>
        <li><a class='logout' href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </div>
</header>
<body>
<main>
<section>

<?php
 session_start();
 if(!$_SESSION["userID"])
 {
   header("Location:admin.login.php");
 }
 ?>

  <?php
  if (isset($_GET["error"]))
   {
    if($_GET["error"]=="wronguser")
    {
      echo "<div class='welcome' style='color: #D61A3C'><h2 class='welcome_mssg'> Wrong ID </h2></div>";
    }
    elseif ($_GET["error"]=="wronghid") {
      echo "<div class='welcome' style='color: #D61A3C'><h2 class='welcome_mssg'> Wrong Hospital ID </h2></div>";
    }
  }
  elseif (isset($_GET["login"])) {
      if ($_GET["login"]=="success") {
        echo "<div class='welcome' style='color: #97DC21'><h2 class='welcome_mssg'> Delete Successful </h2></div>";
      }
    }
  elseif(!isset($_POST["choice-submit"])){
      echo "<div class='welcome'><h2 class='welcome_mssg'> Choose a Category</h2></div>
      <div class='choice_form_box'>
        <form class='choice_form' action='adelete.php' method='post' onsubmit='return validateForm()'>
          <label for='ch'>Patient</label>
          <input type='checkbox' name='ch' value='1'><br>
          <label for='ch'>Doctor</label>
          <input type='checkbox' name='ch' value='2'><br>
          <label for='ch'>Staff</label>
          <input type='checkbox' name='ch' value='3'><br>
          <label for='ch'>Hospital</label>
          <input type='checkbox' name='ch' value='4'><br>
          <input type='submit' name='choice-submit' value='NEXT'>
        </form>
      </div>";
    }

    else {
      if ($_POST["ch"]=="1") {
        echo "<div class='welcome'><h2 class='welcome_mssg'> Patient Delete Form</h2></div>
  <div class='input-form-box'>
    <form class='input-form' action='adelete_p.php' method='post'>
      <label for='pssn'>Patient ID</label>
      <input type='text' name='pssn' placeholder='Enter a valid Patient ID' required><br>

      <input type='submit' name='input-submit' value='Delete'>
    </form>

  </div>";
      }
      elseif ($_POST["ch"]=="2") {
          echo "<div class='welcome'><h2 class='welcome_mssg'> Doctor Delete Form</h2></div>
    <div class='input-form-box'>
      <form class='input-form' action='adelete_d.php' method='post'>
        <label for='dssn'>Doctor ID</label>
        <input type='text' name='dssn' placeholder='Enter a valid Doctor ID' required><br>

        <input type='submit' name='input-submit' value='Delete'>
      </form>

    </div>";
      }

      elseif ($_POST["ch"]=="3") {
        echo "  <div class='welcome'><h2 class='welcome_mssg'> Staff Delete Form</h2></div>
  <div class='input-form-box'>
    <form class='input-form' action='adelete_s.php' method='post'>
      <label for='sssn'>Staff ID</label>
      <input type='text' name='sssn' placeholder='Enter a valid Staff ID' required><br>

      <input type='submit' name='input-submit' value='Delete'>
    </form>

  </div>";
      }

    elseif ($_POST["ch"]=="4") {
      echo "<div class='welcome'><h2 class='welcome_mssg'> Hospital Delete Form</h2></div>
<div class='input-form-box'>
  <form class='input-form' action='adelete_h.php' method='post'>
    <label for='pssn'>Hospital ID</label>
    <input type='text' name='hid' placeholder='Enter a valid Hospital ID' required><br>

    <input type='submit' name='input-submit' value='Delete'>
  </form>

</div>";
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
