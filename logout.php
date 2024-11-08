<?php
session_start();
//destroying the session
session_unset();
session_destroy();

//redirecting to login page
header("location:index.php");
exit();
?>