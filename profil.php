
<?php

  include 'header.php';
  include 'login-wall.php';

  if(isset($_POST['delete-profil'])){
    if($logged_in){
        $result = delete_profil($user_id);
        if($result){
          $profil_deleted = true;
          $msg .= "Sie haben ihr Profil erfolgreich gelöscht.</br>";
          header("Location: index.php");
        }else{
          $msg .= "ERROR";
        }
      }
    }
?>
  <body>
    <section class="menu">
        <main>
              <div class="menu">
                <a href="updateProfil.php?user_id=<?php echo $user_id; ?>">
                  <p><?php echo $user['name']; ?></p>
                </a>
                    <button type="button" name="button">
                      <i class="fas fa-arrow-circle-right fa-2x"></i>
                    </button>
                  </a>
                </div>

              <div class="menu">
                <a href="updateProfil.php?user_id=<?php echo $user_id; ?>">
                  <p><?php echo $user['email']; ?></p>
                </a>
                  <button type="button" name="button">
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                  </button>
                </a>
              </div>

              <div class="menu">
                <a href="updateProfil.php?user_id=<?php echo $user_id; ?>">
                  <p>Passwort *****</p>
                </a>
                  <button type="button" name="button" >
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                  </button>
                </a>
              </div>

              <div class="menu">
                <a href="login.php">
                  <p>Ausloggen</p>
                </a>
                <button type="button" name="button" onclick="window.location.href='/login.php'">
                  <i class="fas fa-arrow-circle-right fa-2x"></i>
                </button>
              </div>

              <div class="menu">
                <p>Profil löschen</p>
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                  <button type="submit" name="delete-profil">
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                  </button>
              </form>
              </div>



        </main>
  <?php include "footer.php";?>
