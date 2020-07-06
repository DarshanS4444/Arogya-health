<?php
session_start();

?>

<!DOCTYPE HTML>
<html>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/starter-template/">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <!--below one is used for iconsjust go to icons  and click copy ND PASTE HERE -->
  <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css">

  <!-- Custom styles for this template -->
  <link href="css/style2.css" rel="stylesheet">
  <title>DOC_REG</title>
  <style>
    .error {
      color: rgb(12, 45, 45);
    }
  </style>
</head>

<body>
  <header>
    <div class="pt-4-xl-3-lg-2" id="topHeader">
      <div class="container-fluid ">
        <!-- division and container row and col-sm are inbuilt classes of bootstrap and extraif we addits for style-->
        <div class="row  ">
          <div class="col-12  text-right">
            <a class="glyphicon glyphicon-earphone"></a>
            <a class="p-1 " href="tel:7411439678"> +91 7411439678</a>
            <a class="glyphicon glyphicon-envelope"></a>
            <a class="p-1" href="mailto:darshandas53@gmail.com">darshandas53@gmail.com</a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <nav class="navbar navbar-default navbar-fixed-top  ">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand classA" href="#"> AROGYA </a>
        <img src="https://skyje.com/wp-content/uploads/2016/10/medical-logo.png" width="100px"></a>

      </div>
      <div id="navbar" class="collapse navbar-collapse">


        <ul class="nav navbar-nav">
          <li class="active"><a href="home.html">Home</a></li>

          <li><a href="aboutus.html">About Us</a></li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="regularcheck.html">Regular Checkup</a></li>
              <li><a href="med_delivery.html">Medicine Delivery</a></li>
              <li><a href="emergency.html">Emergency</a></li>
            </ul>
          </li>

          <li><a href="contact.html">Contact</a></li>
        </ul>



        <!--/.nav-right -->
        <ul class="nav navbar-nav navbar-right">
          <a class="navbar-brand "> Profile </a>
          <li><a class="glyphicon glyphicon-user" href="profile.html"></a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <?php

  include("connect2.php");
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


  // define variables and set to empty values
  $param_name = $nameErr = $emailErr = $usernameErr = $contactErr = $h_depErr = $aboutErr = $passwordErr = $con_passwordErr = $specializationErr = "";
  $name = $username = $email = $contact = $h_dep = $about = $specialization = $password = $con_password = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["username"])) {
      $usernameErr = "UserName is required";
    } else {
      $username = test_input($_POST["username"]);
      // check if name only contains letters and whitespace
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["about"])) {
      $aboutErr = "about is required";
    } else {
      $about = test_input($_POST["about"]);
      // check if state only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $about)) {
        $aboutErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["contact"])) {
      $contactErr = "Contact number is required";
    } else {
      $contact = ($_POST["contact"]);
      // check if contact number is well-formed

    }

    if (empty($_POST["h_dep"])) {
      $h_depErr = "Health department is required";
    } else {
      $h_dep = test_input($_POST["h_dep"]);
    }

    if (empty($_POST["specialization"])) {
      $specializationErr = "Specialization is required";
    } else {
      $specialization = test_input($_POST["specialization"]);
    }


    if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
    } else {
      $password = $_POST["password"];
    }

    if (empty($_POST["con_password"])) {
      $con_passwordErr = "Confirmation of password is required";
    } else {
      $con_password = test_input($_POST["con_password"]);
    }



    if (isset($_POST["email"])) {
      $sql = "SELECT id FROM `doctor` WHERE email='$email'"; //query to check if email exits
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) { //
        $emailErr = "Email already exist";
      }

      if ($con_password != $password) {
        $con_passwordErr = "Password and confirm password did not match";
      }





      if (empty($nameErr) && empty($emailErr) && empty($usernameErr) && empty($contactErr) && empty($h_depErr) && empty($aboutErr) && empty($specializationErr) && empty($passwordErr) && empty($con_passwordErr)) {
        $sql = "INSERT INTO doctor(name,username,email,password,contact_number,health_department,specialization,about) VALUES(?,?,?,?,?,?,?,?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "ssssisss", $param_name, $param_username, $param_email, $param_password, $param_contact, $param_h_dep, $param_specialization, $param_about);

          // Set parameters
          $param_name = $name;
          $param_username = $username;
          $param_email = $email;
          $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
          $param_contact = $contact;
          $param_h_dep = $h_dep;
          $param_specialization = $specialization;
          $param_about = $about;



          // Attempt to execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
            // Redirect to login page
            header("location: doc_login.php");
          } else {
            echo "Something went wrong. Please try again later.";
          }
        }
      }
    }
  }
  //$_SESSION["department"]=$h_dep;
  ?>
  

  <div class="container">
    <div class="reg_form">
      <h2 style="color:#1B1464">Doctor registration form</h2>

      <p><span class="error">* required field</span></p>
      <form method="post" action="">
        Name:<br> <input type="text" name="name">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Username:<br> <input type="text" name="username">
        <span class="error">* <?php echo $usernameErr; ?></span>
        <br><br>
        E-mail:<br> <input type="text" name="email">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        Contact number:<br> <input type="number" name="contact" rows="1" cols="10">
        <span class="error">* <?php echo $contactErr; ?></span>
        <br><br>
        Health department:<br>
        <input type="radio" name="h_dep" value="Cardiology">"Cardiology"<br>
        <input type="radio" name="h_dep" value="Neurology">"Neurology"<br>
        <input type="radio" name="h_dep" value="sense">"sense organs" <br>
        <span class="error">* <?php echo $h_depErr; ?></span>
        <br><br>
        Specialization:<br> <input type="text" name="specialization">
        <span class="error">* <?php echo $specializationErr; ?></span>
        <br><br>
        About:<br> <input type="text" name="about">
        <span class="error">* <?php echo $aboutErr; ?></span>
        <br><br>
        Password:<br>
        <input type="password" name="password">
        <span class="error">* <?php echo $passwordErr; ?></span>
        <br><br>
        Confirm password:<br>
        <input type="password" name="con_password">
        <span class="error">* <?php echo $con_passwordErr; ?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">
      </form>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')
  </script>
  <script src="js/bootstrap.js"></script>


</body>

</html>