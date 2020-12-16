
<?php include 'header.php';

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
                <p><?php echo $user['name']; ?></p>

                <a href="">
                  <button>
                    <i class="fas fa-edit fa-2x"></i>
                  </button>
                </a>
              </div>


              <div class="menu">
                <p><?php echo $user['email']; ?></p>

                <a href="">
                  <button>
                    <i class="fas fa-edit fa-2x"></i>
                  </button>
                </a>
              </div>


              <div class="menu">
                <p>Passwort *****</p>
                <a href="">
                  <button>
                    <i class="fas fa-edit fa-2x"></i>
                  </button>
                </a>
              </div>

              <button type="button" name="button" onclick="window.location.href='/index.php'">
                <p>Ausloggen</p>
              </button>


              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                  <button type="submit" name="delete-profil">Profil löschen</button>
              </form>



        </main>
  <?php include "footer.php";?>
