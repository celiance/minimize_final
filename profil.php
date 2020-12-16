
<?php include 'header.php';?>
  <body>
    <section class="menu">
        <main>
            <div class="menu">
                <p><?php echo $user['name']; ?></p>

              </div>


              <div class="menu">
                <p><?php echo $user['email']; ?></p>
              </div>


              <div class="menu">
                <p>Passwort ***</p>

                  <button>
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                  </button>
                </a>
              </div>

              <div class="menu">
                <p>Ausloggen</p>

                <button type="button" name="button" onclick="window.location.href='/index.php'">
                  <i class="fas fa-arrow-circle-right fa-2x"></i>
                </button>
              </div>


              <div class="menu">
                <p>Profil löschen</p>

                <button type="button" name="button" onclick="window.location.href='/index.php'">
                  <i class="fas fa-arrow-circle-right fa-2x"></i>
                </button>
              </div>


        </main>
  <?php include "footer.php";?>
