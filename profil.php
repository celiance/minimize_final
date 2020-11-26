<?php
  session_start();

  require_once('system/config.php');
  require_once('system/data.php');
  include 'header.php';

  if(isset($_SESSION['userid'])){
    $user = get_user_by_id($_SESSION['userid']);
    $user_id = $user['id'];
    $logged_in = true;
    $log_in_out_text = "Logout";

  }else{
    $logged_in = false;
    $log_in_out_text = "Anmelden";

  //Umleitung zu Login, falls noch nicht eingeloggt
  //  header("Location: https://minimize.celiance.ch/login.php");
  }


?>

  <!-- MAIN MAIN -->
  <main>

    <div class="profilupdate">

      <!--Produktanzeige-->
      <h2><?php echo $user['name']; ?></h2>
      <div class="">
        <h5><?php echo $user['email']; ?></h5>
        <h5>******</h5>
        <h5>Passwort ändern</h5>
      </div>

      <button type="button" name="button" onclick="window.location.href='/profil.php'">Speichern</button>
      <button type="button" name="button" onclick="window.location.href='/login.php'"><?php echo $log_in_out_text; ?></button>
      <h5 class="delete">Profil löschen</h5>
    </div>
  </main>
<?php include 'footer.php';?>
