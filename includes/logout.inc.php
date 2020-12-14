<?php
  session_start();
  session_unset();
  session_destroy(); //Close session - logout user;

  header("location: ../index.php");
  exit();
