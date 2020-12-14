<?php
  session_start(); //Allows for User to remain logged in.
?>

<!DOCTYPE html>
<html lang="en" dir="ltr"> <!-- HTML Setup -->
  <head> <!-- Page Information -->
    <meta charset="utf-8">
    <title>PHP Project 01</title>
    <link rel="stylesheet" href="css/reset.css"> <!-- CSS File for reseting display upon navigation/refresh of page 12:25 -->
    <link rel="stylesheet" href="css/style.css"> <!-- CSS File for seting up visual changes to page -->
  </head>

  <body> <!-- Content Displayed to User -->
    <nav> <!-- Navigation -->
      <div class="wrapper">
        <ul> <!-- List containing navigational options on page with PHP files linked -->
          <li><a href="index.php">Home</a></li>
          <li><a href="discover.php">About Us</a></li>
          <li><a href="blog.php">Find Blogs</a></li>
          <?php
            //Check if User is logged in
            if (isset($_SESSION["useruid"])){
              echo "<li><a href='profile.php'>Profile Page</a></li>";
              echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
            }
            else {
              echo "<li><a href='signup.php'>Sign Up</a></li>";
              echo "<li><a href='login.php'>Log In</a></li>";
            }
          ?>
        </ul>
      </div>
    </nav>

  <div class="wrapper">
