<?php
  include_once 'header.php';
?>

    <!-- Setup for the Log In Page of the WS -->
    <section class="index-intro">
      <h2>Log In</h2>
      <form action="includes/login.inc.php" method="post"> <!-- .inc = Include File -->
        <input type="text" name="uid" placeholder="Username/Email...">
        <input type="password" name="pwd" placeholder="Password...">
        <button type="submit" name="submit">Log In</button>
      </form>
      <?php
        //Check if user submited form correctly + Error Handling via URL messages
        if (isset($_GET["error"])){
          if ($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
          }
          else if ($_GET["error"] == "incorrectlogin"){
            echo "<p>Incorrect Login Information!</p>";
          }
        }
      ?>
    </section>

<?php
  include_once 'footer.php';
?>
