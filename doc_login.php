 <?php
  include("connect2.php");
  session_start();
  $error = "";


  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    //if(isset($_POST["username"] && isset($_POST["password"]))){
    $sql = "select username,password from doctor where username='$username', password = '$password'";
    
   //$h_dep0= "select health_department from doctor where username='$username'";
    //$_SESSION["department"]=$h_dep0;
  
  
    $result = mysqli_query($link, $sql);
    // }
    if (mysqli_num_rows($result) > 0) {
      session_start();
      $_SESSION['usernameses'] = $username;
      header("location:doc_main.php");
    } else {
      echo '<script type="text/javascript"> alert("Invalid credentials")</script>';
    }
  }
  ?>


 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/starter-template/">

   <title>Doctor login</title>

   <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">

   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
   <!--below one is used for iconsjust go to icons  and click copy ND PASTE HERE -->
   <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css">

   <!-- Custom styles for this template -->
   <link href="css/style2.css" rel="stylesheet">

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

   <div class="jumbotron5">
     <div class="container">
       <div id="main_wrapper">

         <img src="images/login2.jpg" width="300px" alt=" " class="login_emo"><br>
         <form action="" method="POST" class="form">
           <label><b>Username</b></label><br>
           <input name="username" type="text" class="inputvalues" placeholder="Type your username"><br><br>
           <label><b>Password</b></label><br>
           <input name="password" type="password" class="inputvalues" placeholder="Type your password"><br><br>
           <input name="login" type="submit" id="login_btn" value="login">
         </form>
       </div>
     </div>
   </div>


   <!-- Bootstrap core JavaScript
    ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
   <script>
     window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')
   </script>
   <script src="js/bootstrap.js"></script>
 </body>

 </html>