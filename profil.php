
<?php include 'header.php';?>
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
                <p>Passwort ***</p>
                <a href="">
                  <button>
                    <i class="fas fa-edit fa-2x"></i>
                  </button>
                </a>
              </div>

              <button type="button" name="button" onclick="window.location.href='/index.php'">
                <p>Ausloggen</p>
              </button>

              <div class="menu">
                <a href="">
                <p>Profil löschen</p>
                </a>
              </div>


        </main>
  <?php include "footer.php";?>
