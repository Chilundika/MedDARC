<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Search</title>

    <link rel="apple-touch-icon" sizes="180x180" href="Resource/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Resource/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Resource/favicon/favicon-16x16.png">
    <link rel="manifest" href="Resource/favicon/site.webmanifest">
    <link rel="stylesheet" type="text/css" href="css/styles2.css">
  </head>  
<body>
<header style="display: flex; align-items: center;">
  <img src="Resource/logo.png" alt="logo" width="50px" height="50px">
  <h1 style="margin-left: 10px; font-size: 20px;">MedDARC</h1>
  <div class="navigation-bar" style="margin-left: auto;">
    <nav>
      <ul>
        <li><a href="ddashboard.php">Home</a></li>
        <li><a href="dsearch.php">Search</a></li>
        <li><a href="dinsert.php">Insert</a></li>
        <li><a class='logout' href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </div>
</header>
<main>
  <section>
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
    session_start();
    if (!$_SESSION["userID"]) {
      header("Location:doctor.login.php");
    }
    ?>

    <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "wronguser") {
        echo "<div class='welcome' style='color: #D61A3C'><h2 class='welcome_mssg'> Wrong Patient ID </h2></div>";
      }
    } elseif (isset($_GET["login"])) {
      if ($_GET["login"] == "success") {
        echo "<div class='welcome' style='color: #97DC21'><h2 class='welcome_mssg'> Record Saved Successfully </h2></div>";
      }
    } elseif (!isset($_POST["choice-submit"])) {
      echo "<div class='welcome'><br><br><br><h2 class='welcome_mssg'> Choose a Category</h2></div>
      <hr>
      <div class='choice_form_box'>
        <form class='choice_form' action='dinsert.php' method='post' onsubmit='return validateForm()'>
          <label for='ch1'>Consultation</label>
          <input type='checkbox' id='ch1' name='ch' value='1'><br>
          <label for='ch2'>Surgery</label>
          <input type='checkbox' id='ch2' name='ch' value='2'><br>
          <label for='ch3'>Diagnosis</label>
          <input type='checkbox' id='ch3' name='ch' value='3'><br>
          <input type='submit' name='choice-submit' value='NEXT' style='background-color:lightskyblue;'>
        </form>
      </div>
      <script>
        function validateForm() {
          const checkboxes = document.querySelectorAll('input[type=\"checkbox\"]');
          for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
              return true;
            }
          }
          alert('Please select at least one option.');
          return false;
        }
      </script>";
    } else {
      if ($_POST["ch"] == "1") {
        echo "<div class='welcome'><h2 class='welcome_mssg'> Consultation Form</h2></div>
        <div class='input-form-box'>
          <form class='input-form' action='dinsert_con.php' method='post'>
            <label for='pssn'>Patient ID</label>
            <input type='text' name='pssn' placeholder='Enter a valid Patient ID' required><br>
            <label for='date'>Date</label>
            <input type='text' name='date' id='date' placeholder='Enter Date' required><br>
            <label for='time'>Time</label>
            <input type='text' name='time' id='time' placeholder='Enter Time' required><br>
            <label for='complains'>Complains</label>
            <textarea name='complains' placeholder='Write complains' required></textarea><br>
            <label for='findings'>Findings</label>
            <textarea name='findings' placeholder='Write findings' required></textarea><br>
            <label for='treatments'>Treatments</label>
            <textarea name='treatments' placeholder='Treatments if any'></textarea><br>
            <label for='meds'>Medicines</label>
            <textarea name='meds' placeholder='Medicines if any'></textarea><br>
            <label for='allerigies'>Allergies</label>
            <textarea name='allergies' placeholder='Allergies if any'></textarea><br>
            <input type='submit' name='input-submit' value='Save'>
          </form>
        </div>";
      } elseif ($_POST["ch"] == "2") {
        echo "<div class='welcome'><h2 class='welcome_mssg'> Surgery Form</h2></div>
        <div class='input-form-box'>
          <form class='input-form' action='dinsert_sur.php' method='post'>
            <label for='pssn'>Patient ID</label>
            <input type='text' name='pssn' placeholder='Enter a valid Patient ID' required><br>
            <label for='date'>Date</label>
            <input type='text' name='date' id='date' placeholder='Enter Date' required><br>
            <label for='time'>Time</label>
            <input type='text' name='time' id='time' placeholder='Enter Time' required><br>
            <label for='description'>Description</label>
            <textarea name='description' placeholder='Surgery Description' required></textarea><br>
            <label for='complication'>Complications</label>
            <textarea name='complication' placeholder='Surgery Complications'></textarea><br>
            <label for='allerigies'>Allergies</label>
            <textarea name='allergies' placeholder='Allergies if any'></textarea><br>
            <input type='submit' name='input-submit' value='Save'>
          </form>
        </div>";
      } elseif ($_POST["ch"] == "3") {
        echo "<div class='welcome'><h2 class='welcome_mssg'> Diagnosis Form</h2></div>
        <div class='input-form-box'>
          <form class='input-form' action='dinsert_diag.php' method='post'>
            <label for='pssn'>Patient ID</label>
            <input type='text' name='pssn' placeholder='Enter a valid Patient ID' required><br>
            <label for='date'>Date</label>
            <input type='text' name='date' id='date' placeholder='Enter Date' required><br>
            <label for='time'>Time</label>
            <input type='text' name='time' id='time' placeholder='Enter Time' required><br>
            <label for='diagname'>Diagnosis Name</label>
            <input type='text' name='diagname' placeholder='Diagnosis Name' required><br>
            <label for='description'>Description</label>
            <textarea name='description' placeholder='Diagnosis Description' required></textarea><br>
            <label for='complication'>Complications</label>
            <textarea name='complication' placeholder='Diagnosis Complications if any'></textarea><br>
            <label for='allerigies'>Allergies</label>
            <textarea name='allergies' placeholder='Allergies if any'></textarea><br>
            <input type='submit' name='input-submit' value='Save'>
          </form>
        </div>";
      }
    }
    ?>
  </section>
</main><br><br><br><br><br><br><br><br><br><br>
<footer>
  <p>&copy; DeZign-BluPrint ZM @ 2024</p><br>
 </footer>
</body>
</html>
