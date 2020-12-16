<?php
  session_start();


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


 <?php
  $unterscheidung = true;
  ?>
  <?php include 'header.php';?>
    <body>
        <section class="login">
          <main>
               <p>Logge dich ein um minimize zu nutzen.</p>


               <div class="register">
                 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <div>
                  <label for="email">E-Mail</label></br>
                  <input type="text" name="email" value="" id="email"></br>
                </div>

                <div>
                  <label for="password">Passwort</label></br>
                  <input type="password" name="password" value="" id="password"></br>
                </div>

                <button type="submit" name="login_submit" value="login">Einloggen</button>
              </form>


              <!-- Nachricht -->
              <?php if(!empty($msg)){ ?>
              <div class="nachricht" role="alert">
                <p><?php echo $msg ?></p>
              </div>
              <?php } ?>
              
              <a href="register.php">
                <h6>Du bist noch nicht registriert? Hier entlang!</h6>
              </a>
            </section>
          </main>
        </div>
    </div>



  </body>
</html>
