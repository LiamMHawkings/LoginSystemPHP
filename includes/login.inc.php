<?php
  if (isset($_POST["submit"])){
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //Check for all required inputs
    if (emptyInputLogin($username, $pwd) !== false){
      header("location: ../login.php?error=emptyinput");
      exit(); //Stop current script from running.
    }

    loginUser($conn, $username, $pwd);
  }
  else {
    header("location: ../login.php");
    exit(); //Stop current script from running.
  }
