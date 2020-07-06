  
<?php
session_start();
$_SESSION = array();
session_destroy();
header('location:home.html');
echo '<script type="text/javascript"> alert("logout sucessful")</script>';
exit;
?>