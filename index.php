<?php
  include_once 'header.php';
?>

    <section class="index-intro">
      <?php
        //Check if User is logged in
        if (isset($_SESSION["useruid"])){
          echo "<p>Welcome back " . $_SESSION["useruid"] . "</p>";
        }
      ?>
      <h1>Introduction</h1>
      <p>Content About The Website.</p>
    </section>

    <section class="index-categories">
      <h2>Some Basic Categories</h2>
      <div class="index-categories-list">
        <div>
          <h3>Fun Stuff</h3>
        </div>
        <div>
          <h3>Serious Stuff</h3>
        </div>
        <div>
          <h3>Exciting Stuff</h3>
        </div>
        <div>
          <h3>Boring Stuff</h3>
        </div>
      </div>
    </section>

<?php
  include_once 'footer.php';
?>
