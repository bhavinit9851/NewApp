<?php
session_start();
print_r($_SESSION);
if(session_destroy()) // Destroying All Sessions
{
    header("Location: login_user.php"); // Redirecting To Home Page
}
?>