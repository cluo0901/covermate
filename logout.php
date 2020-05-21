<?php
// Initialize the session
session_start();

$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php");
exit;
?>