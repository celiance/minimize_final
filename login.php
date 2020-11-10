<?php
  session_start();

  include 'header.php';
  require_once('system/config.php');
  require_once('system/data.php');


  if(isset($_SESSION['userid'])) {
    unset($_SESSION['userid']);
    session_destroy();
    }

  $logged_in = false;
  $log_in_out_text = "Login";


  if(isset($_POST['login_submit'])){
    $login_valid = true;

    $msg = "";

    if(!empty($_POST['email'])){
      $email = $_POST['email'];
    }else{
      $msg .= "Du hast vergessen deine E-Mail einzugeben.<br>";
      $login_valid = false;
    }

    if(!empty($_POST['password'])){
      $password = $_POST['password'];
    }else{
      $msg .= "Du hast vergessen dein Passwort einzugeben.<br>";
      $login_valid = false;
    }

    if($login_valid){
      $result = login($email , $password);

      if($result){
        $user = $result;
        $_SESSION['userid'] = $user['id'];

        header("Location: https://minimize.celiance.ch/home-uebersicht.php");


      }else{
        $msg = "Die Benutzerdaten sind nicht in unserer Datenbank vorhanden.";
      }
    }
  }
?>
          <!-- LOGIN -->
          <main>
            <div class="login">
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <label for="email">E-Mail</label></br>
                <input type="text" name="email" value="" id="email"></br>
                <label for="password">Passwort</label></br>
                <input type="password" name="password" value="" id="password"></br>
                <button type="submit" name="login_submit" value="einloggen">Anmelden</button>
              </form>
              <!-- Nachricht -->
              <?php if(!empty($msg)){ ?>
              <div class="nachricht" role="alert">
                <p><?php echo $msg ?></p>
              </div>
              <?php } ?>
            </div>
          </main>
        </div>
    </div>



  </body>
</html>
