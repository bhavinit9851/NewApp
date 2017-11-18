<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
    header("Location: login_user.php"); // Redirecting To Home Page
}
?>