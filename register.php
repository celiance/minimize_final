<?php include 'header.php';?>
  <!-- MAIN MAIN -->
  <main>
    <div class="main-content">
      <h2>Registriere dich jetzt</h2>
      <p>Hier kommt ein fancy Text.</p>
      <form class="" action="/home-uebersicht.php" method="post">
        <label for="Name">Dein Name</label><br>
        <input type="text" name="Name" value="">
        <label for="Email">Email</label><br>
        <input type="text" name="Email" value=""><br>
        <label for="Passwort">Passwort</label><br>
        <input type="text" name="Passwort" value=""><br>
        <label for="Passwort">Passwort bestätigen</label><br>
        <input type="text" name="Passwort" value=""><br><br>

        <button type="button" name="button" onclick="window.location.href='/home-uebersicht.php'">Registrieren</button>
      </form>
    </div>
  </main>
<?php include 'footer.php';?>
