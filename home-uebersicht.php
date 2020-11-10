
<?php
  session_start();

  include 'header.php';
  require_once('system/config.php');
  require_once('system/data.php');

?>


  <!-- MAIN MAIN -->
  <main>
    <div class="main-content">
      <h2>Hallo <?php echo $user['name']; ?></h2>
      <p>Was möchtest du tun?</p>
      <a href="/MeinInventar.php">
        <div class="box">
          <h3>Mein Inventar</h3>
          <div class="inventarBilder">
            <img src="assets/testbild.jpg" alt="bild inventar 1">
            <img src="assets/testbild.jpg" alt="bild inventar 1">
            <img src="assets/testbild.jpg" alt="bild inventar 1">
          </div>
        </div>
      </a>

      <a href="#">
        <div class="box">
          <h3>Noch in Gebrauch?</h3>
          <div class="inventarBilder">
            <img src="assets/testbild.jpg" alt="bild inventar 1">
            <img src="assets/testbild.jpg" alt="bild inventar 1">
            <img src="assets/testbild.jpg" alt="bild inventar 1">
          </div>
        </div>
      </a>

      <a href="#">
        <div class="box">
          <h3>Noch in Gebrauch?</h3>
          <div class="inventarBilder">
            <img src="assets/testbild.jpg" alt="bild inventar 1">
            <img src="assets/testbild.jpg" alt="bild inventar 1">
            <img src="assets/testbild.jpg" alt="bild inventar 1">
          </div>
        </div>
      </a>

    </div>
  </main>
<?php include 'footer.php';?>
