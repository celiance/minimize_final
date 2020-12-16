<?php

  include ('header.php');
  $unterscheidung = true;
  $all_products = get_product_push($user_id);


?>
<body class="inventar">
  <section class="inventar navbackground">

      <main>
        <h2>Brauchst du diese Artikel noch?</h2>
        <!--Alle Push-Produkte-->
        <div class="produktbox">
          <!--Einzelnes Produkt-->
          <?php foreach ($all_products as $product) { ?>
            <a href="/produkseite.php">
              <!--Produktbild-->
              <img class="testbild" src="assets/testbild.jpg" alt="testbild" style="width:100%">
            </a>
            <!--Angaben Produkt-->
            <div class="alerttext">
              <p><?php echo $product['product_name']; ?></p>
              <h6>
                Gekauft im:</br>
                <?php
                  $date = DateTime::createFromFormat('Y-m-d', $product["purchase_date"]);
                  echo htmlspecialchars($date->format('F Y'), ENT_QUOTES, "UTF-8");
                ?>
              </h6>
            </div>
            <div class"buttonalert">
              <button class="löschenalert"type="submit" name="register_submit" value="registrieren">Nö, besser verkaufen!</button>
              <button class="artikelbehalten"type="submit" name="register_submit" value="registrieren">Artikel behalten!</button>
            </div>
            <a href="">
              <button class="produktonlyedit">
                <i class="fas fa-pen"></i>
              </button>
            </a>
        <?php }?>
      </div>

</div>

</main>
<?php include "footer.php";?>
