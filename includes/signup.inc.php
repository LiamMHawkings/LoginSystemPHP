<?php

  //Check user has accessed page correctly
  if (isset($_POST["submit"])){
    //Super Globals initialisation for user information
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //Check for all required inputs
    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
      header("location: ../signup.php?error=emptyinput");
      exit(); //Stop current script from running.
    }

    //Check for invalid usernames
    if (invalidUID($username) !== false){
      header("location: ../signup.php?error=invaliduid");
      exit(); //Stop current script from running.
    }

    //Check for invalid emails
    if (invalidEmail($email) !== false){
      header("location: ../signup.php?error=invalidemail");
      exit(); //Stop current script from running.
    }

    //Check for matching passwords
    if (pwdMatch($pwd, $pwdRepeat) !== false){
      header("location: ../signup.php?error=passwordsdontmatch");
      exit(); //Stop current script from running.
    }

    //Check for exisiting username with SQLiDatabase
    if (uidExists($conn, $username, $email) !== false){
      header("location: ../signup.php?error=usernametaken");
      exit(); //Stop current script from running.
    }

    //Create user profile with given inputs
    createUser($conn, $name, $email, $username, $pwd);
  }

  //Else return user to signup page.
  else {
    header("location: ../signup.php");
    exit(); //Stop current script from running.
  }
