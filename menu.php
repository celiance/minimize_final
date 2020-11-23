

<?php
  session_start();

  require_once('system/config.php');
  require_once('system/data.php');

?>


  <!-- MAIN MAIN -->
  <!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>minimize</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="main.css">
      <script src="main.js"></script>
  </head>
  <body class="home">
    <section class="menu">
        <header>
            <?php include 'header.php';?>
        </header>

        <main>

              <div class="menu">
                <p>Über minimize</p>

                <a href="/MeinInventar.php">
                  <button>
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                  </button>
                </a>
              </div>

              <div class="menu">
                <p>Hilfe</p>

                <a href="/MeinInventar.php">
                  <button>
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                  </button>
                </a>
              </div>

              <div class="menu">
                <p>Impressum</p>

                <a href="/MeinInventar.php">
                  <button>
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                  </button>
                </a>
              </div>


        </main>

        <footer>
            <?php include "footer.php";?>
        </footer>
    </section>
</body>
</html>
