<?php include 'header.php';?>
  <!-- MAIN MAIN -->
  <main>
    <div class="main-content">
      <h2>Artikel erfassen</h2>
      <p>Bitte mache ein Foto von deinem Produkt oder lade eins aus deinem Fotoalbum hoch.</p>
      <form class="" action="/produktseite.php" method="post">
        <input type="file" accept="video/*;capture=camcorder"><br><br>

        <p>Fülle bitte folgende Felder aus.</p>

          <label for="bez">Produktbezeichnung</label><br>
          <input type="text" name="bez" value=""><br>
          <label for="datum">Gekauft am</label><br>
          <input type="text" name="datum" value=""><br>
          <label for="beschr">Beschreibung</label><br>
          <input type="text" name="beschr" value=""><br>
          <label for="ean">EAN-Code</label><br>
          <input type="text" name="ean" value=""><br><br>

          <button type="button" name="button" onclick="window.location.href='/produktseite.php'">Erfassen</button>
      </form>
    </div>
  </main>
<?php include 'footer.php';?>
