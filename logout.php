<?php
session_start(); //Set it to still have an access to session.
session_unset(); // Destroy the whole session in order to log out.

header('Location:index.php?status=loggedout');//redirect to index.php after signing out. 
//The purpose of '?status=loggedout' is to display message in index page when user is signed out. 
?>

