
<?php
  session_start();

  include 'header.php';
  require_once('system/config.php');
  require_once('system/data.php');

  if(isset($_SESSION['userid'])){
    $user = get_user_by_id($_SESSION['userid']);
    $user_id = $user['id'];
    $logged_in = true;
    $log_in_out_text = "Logout";
    $name = $user['name'];

  }else{
    $logged_in = false;
    $log_in_out_text = "Anmelden";

  //Umleitung zu Login, falls noch nicht eingeloggt
  //  header("Location: https://minimize.celiance.ch/login.php");
  }



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
