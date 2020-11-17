
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>

<body>
    <section class="onepage">
        <header>
            <?php include 'header.php';?>
        </header>
        <main>
             <h2>Weniger Konsum (1)</h2>
            <p>Hier kommt ein fancy Text.</p>
            <button type="button" name="button" onclick="window.location.href='/rundgang_2.php'"><img src="assets/arrow_black.png" alt="pfeil" class="arrow_black"></button>
        </main>
        <footer>
            <?php include 'footerloggout.php';?>
        </footer>
    </section>
</body>

</html>
