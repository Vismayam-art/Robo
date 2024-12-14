<?php
// Start the session
session_start();

// Unset individual session variables if needed
unset($_SESSION['uid']);
// unset($_SESSION['other_variable']);

// Destroy the session
session_destroy();

// Redirect to the login page or another page after destroying the session
header("Location: admin.php");
exit();
?>
