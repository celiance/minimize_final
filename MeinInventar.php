

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
  <body class="inventar">
    <section class="inventar">
        <header>
            <?php include 'header.php';?>
        </header>

        <main>
            <h2>Mein Inventar</h2>



            </div>

              <div class="produktbox">
                <a href="/produkseite.php">
                <img class="testbild" src="assets/testbild.jpg" alt="testbild" style="width:100%">
                </a>
                <p class="produktname"> jsdnfsdf</p>
                <p class="datum"> 5.12.12</p>
              </div>

              <div class="produktbox">
                <a href="/produkseite.php">
                <img class="testbild" src="assets/testbild.jpg" alt="testbild" style="width:100%">
                </a>
                <p class="produktname"> jsdnfsdf</p>
                <p class="datum"> 5.12.12</p>
              </div>

              <div class="produktbox">
                <a href="/produkseite.php">
                <img class="testbild" src="assets/testbild.jpg" alt="testbild" style="width:100%">
                </a>
                <p class="produktname"> jsdnfsdf</p>
                <p class="datum"> 5.12.12</p>
              </div>

        </main>

        <footer>
            <?php include "footerloggout.php";?>
        </footer>

    </section>
</body>
</html>
