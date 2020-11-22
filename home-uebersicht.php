
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
      <script src="https://kit.fontawesome.com/898fafec69.js" crossorigin="anonymous"></script>
  </head>
  <body class="home">
    <section class="home">
        <header>
            <?php include 'header.php';?>
        </header>

        <main>
            <h2>Hallo <?php echo $user['name']; ?></h2>

              <div class="box">
                <p>Mein Inventar</p>

                <a href="/MeinInventar.php">
                  <button>
                    <i class="fas fa-arrow-circle-right fa-3x"></i>
                  </button>
                </a>
              </div>

              <div class="box">
                <p>Noch in Gebrauch?</p>

                <a href="/MeinInventar.php">
                  <button>
                    <i class="fas fa-arrow-circle-right fa-3x"></i>
                  </button>
                </a>
              </div>


        </main>

        <footer>
            <?php include "footerloggout.php";?>
        </footer>
    </section>
</body>
</html>
