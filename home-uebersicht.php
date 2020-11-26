<?php include 'header.php';?>
  <body class="home">
    <section class="home">
        <main>
            <h2>Hallo <?php echo $user['name']; ?></h2>

              <div class="box">
                <p>Mein Inventar</p>

                <a href="/MeinInventar.php">
                  <button>
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                  </button>
                </a>
              </div>

              <div class="box">
                <p>Noch in Gebrauch?</p>

                <a href="/MeinInventar.php">
                  <button>
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                  </button>
                </a>
              </div>


        </main>
      <?php include "footer.php";?>
