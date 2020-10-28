<?php include 'header.php';?>
  <!-- MAIN MAIN -->
  <main>
    <div class="main-content">
      <h2>Artikel erfassen</h2>
      <p>Bitte mache ein Foto von deinem Produkt oder lade eins aus deinem Fotoalbum hoch.</p>
      <form class="" action="/home-uebersicht.php" method="post">
        <input type="file" accept="video/*;capture=camcorder"><br><br>

        <button type="button" name="button" onclick="window.location.href='/home-uebersicht.php'">Weiter</button>
      </form>
    </div>
  </main>
<?php include 'footer.php';?>
