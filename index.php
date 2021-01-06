

<?php
  include 'header.php';
  if(isset($_SESSION['userid'])) {
    unset($_SESSION['userid']);
    session_destroy();
    }

  $logged_in = false;
?>

<head>
  <meta charset="utf-8">
  <link rel="manifest" href="manifest.json">
</head>

<!-- #3/2: Install prompt -->
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
// This is the "Offline page" service worker

// Add this below content to your HTML page inside a <script type="module"></script> tag, or add the js file to your page at the very top to register service worker
// If you get an error about not being able to import, double check that you have type="module" on your <script /> tag

/*
 This code uses the pwa-update web component https://github.com/pwa-builder/pwa-update to register your service worker,
 tell the user when there is an update available and let the user know when your PWA is ready to use offline.
*/

import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

const el = document.createElement('pwa-update');
document.body.appendChild(el);






</script>
