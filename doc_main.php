<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/starter-template/">

  <title>doctor main</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <!--below one is used for iconsjust go to icons  and click copy ND PASTE HERE -->
  <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css">

  <!-- Custom styles for this template -->
  <link href="css/style2.css" rel="stylesheet">
  <style>
    .serif {
      font-family: "Times New Roman", Times, serif;
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
  <div class="container">
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
            <li class="active"><a href="doc_main.php">Home</a></li>

            <li><a href="#">About Us</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Regular Checkup</a></li>
                <li><a href="#">Medicine Delivery</a></li>
                <li><a href="#">Emergency</a></li>
              </ul>
            </li>

            <li><a href="#">Contact</a></li>
          </ul>



          <!--/.nav-right -->
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">profile<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="doc_logout.php">logout</a></li>
            </li>
          </ul>

        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>

    <div class="jumbotron6">
      <?php
      session_start();
      include("connect2.php");

      

      $dummyusername1 = $_SESSION["usernameses"];
      $sql2= "select health_department from doctor where username='$dummyusername1'";
      $result1 = mysqli_query($link, $sql2);
      if (mysqli_num_rows($result1) > 0) {
        while($row = mysqli_fetch_assoc($result1)){
        $h_dep1 = $row["health_department"];
        }
        }
      
      $sql = "SELECT name,email,contact_number,city FROM patient WHERE health_department='$h_dep1'";
      $result = mysqli_query($link, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
       
        echo "The following patients have requested for an appointment:";
        echo "<br><br>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "Name: " . $row["name"] . "<br>" . "Email id: " . $row["email"] . "<br> " . "Contact: " . $row["contact_number"] . "<br>" . "City: " . $row["city"] . "<br><br><br>";
        }
      } else {
        echo "No match found";
      }
      ?>
    </div>
  </div>
   <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
  <script src="js/bootstrap.js"></script>
</body>