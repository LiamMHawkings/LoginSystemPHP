<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
  $result;
  //Built in function checks for empty input for variable.
  if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
    $result = true; //If mistake
  }
  else {
    $result = false;
  }
  return $result;
}

function invalidUID($username){
  $result;
  //Built in function writes search parameter (algorithm), that checks match with string input.
  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    $result = true; //If mistake
  }
  else {
    $result = false;
  }
  return $result;
}

function invalidEmail($email){
  $result;
  //Built in function checks for correct email.
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $result = true; //If mistake
  }
  else {
    $result = false;
  }
  return $result;
}

function pwdMatch($pwd, $pwdRepeat){
  $result;
  //Check for matching passwords
  if ($pwd !== $pwdRepeat){
    $result = true; //If mistake
  }
  else {
    $result = false;
  }
  return $result;
}

function uidExists($conn, $username, $email){
  //Checking for usernames and emails
  $sql = "SELECT * FROM users WHERE usersUID = ? OR usersEmail = ?;";
  //Creating prepared statement using connection to the database
  $stmt = mysqli_stmt_init($conn);
  //Run SQL statement inside database to check for errors
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  //Built in function passses user data((ss)username.email)
  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  //Execute the statement
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  //Fetch data as an associate of an array.
  //Return all data from DB if this users exists in DB.
  if ($row = mysqli_fetch_assoc($resultData)){
    return $row;
  }
  else {
    $result = false;
    return $result;
  }

  //Close down prepared statement
  mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd){
  //Insert data into database (signup USER)
  $sql = "INSERT INTO users (usersName, usersEmail, usersUID, usersPW) VALUES (?, ?, ?, ?);";
  //Creating prepared statement using connection to the database
  $stmt = mysqli_stmt_init($conn);
  //Run SQL statement inside database to check for errors
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  //Encrypt password
  $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

  //Built in function passses user data((ssss)name.username.email.password)
  mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPWD);
  //Execute the statement
  mysqli_stmt_execute($stmt);
  //Close down prepared statement
  mysqli_stmt_close($stmt);
  header("location: ../signup.php?error=none");
  exit();
}

function emptyInputLogin($username, $pwd){
  $result;
  //Built in function checks for empty input for variable.
  if (empty($username) || empty($pwd)){
    $result = true; //If mistake
  }
  else {
    $result = false;
  }
  return $result;
}

function loginUser($conn, $username, $pwd){
  $uidExists = uidExists($conn, $username, $username);

  if ($uidExists === false){
    header("location: ../login.php?error=incorrectlogin");
    exit(); //Stop current script from running.
  }

  $pwdHashed = $uidExists["usersPW"];
  //Check entered password matches database password
  $checkPWD = password_verify($pwd, $pwdHashed);

  if ($checkPWD === false){
    header("location: ../login.php?error=incorrectlogin");
    exit(); //Stop current script from running.
  }
  else if ($checkPWD === true){
    session_start(); //Allows session variables (super globals) to be created.
    $_SESSION["userid"] = $uidExists["usersID"];
    $_SESSION["useruid"] = $uidExists["usersUID"];
    header("location: ../index.php");
    exit(); //Stop current script from running.
  }
}
