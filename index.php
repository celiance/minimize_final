<?php
  include 'header.php';
  if(isset($_SESSION['userid'])) {
    unset($_SESSION['userid']);
    session_destroy();
    }

  $logged_in = false;
?>

<header>
  <link rel="manifest" href="manifest.json">
</header>
<body>
    <section class="onepage">
        <main>
          <section id="installBanner" class="banner">
 <button id="installBtn">Install app</button>
</section>
            <h2> Rundgang starten. </h2>
             <p>Nutzte minimize und behalte den Überblick über dein Zuhause.</p>

             <button type="button" name="button" onclick="window.location.href='/rundgang_1.php'">
                 <i class="fas fa-arrow-circle-right fa-3x"></i>
              </button>

            <button class="loginbutton" type="button" name="button" onclick="window.location.href='/login.php'">
              <h6>Login</h6>
            </button>
        </main>

<?php include 'footer.php';?>

<script>
if ('serviceWorker' in navigator) {
window.addEventListener('load', function() {
navigator.serviceWorker.register('service_worker.js')
.then(reg => {
console.log('Service worker registered!', reg);
})
.catch(err => {
console.log('Service worker registration failed: ', err);
});
});
};
</script>
