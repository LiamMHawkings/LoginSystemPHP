<?php
  include_once 'header.php';
?>

    <!-- Setup for the Signup Page of the WS -->
    <section class="index-intro">
      <h2>Sign Up</h2>
      <form action="includes/signup.inc.php" method="post"> <!-- .inc = Include File -->
        <input type="text" name="name" placeholder="Full Name...">
        <input type="text" name="email" placeholder="Email...">
        <input type="text" name="uid" placeholder="Username...">
        <input type="password" name="pwd" placeholder="Password...">
        <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
        <button type="submit" name="submit">Sign Up</button>
      </form>
      <?php
        //Check if user submited form correctly + Error Handling via URL messages
        if (isset($_GET["error"])){
          if ($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
          }
          else if ($_GET["error"] == "invaliduid"){
            echo "<p>Choose a proper username!</p>";
          }
          else if ($_GET["error"] == "invalidemail"){
            echo "<p>Choose a real email!</p>";
          }
          else if ($_GET["error"] == "passwordsdontmatch"){
            echo "<p>passwordsdontmatch!</p>";
          }
          else if ($_GET["error"] == "stmtfailed"){
            echo "<p>Something went wrong! Try again.</p>";
          }
          else if ($_GET["error"] == "usernametaken"){
            echo "<p>Username is already taken!.</p>";
          }
          else if ($_GET["error"] == "none"){
            echo "<p>Sign up succesful!</p>";
          }
        }
      ?>
    </section>

<?php
  include_once 'footer.php';
?>
