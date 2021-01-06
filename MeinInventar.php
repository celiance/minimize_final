<?php

  include ('header.php');
  include 'login-wall.php';
  $unterscheidung = true;
  $all_products = get_product($user_id);



?>


  <body class="inventar">
    <section class="inventar navbackground">

        <main>
            <h2>Mein Inventar</h2>
            <div class="container">
            </div>
            <!--Alle Produkte-->
            <div class="container">
              <!--leere proudktliste-->
            <?php  if(empty($all_products)){ ?>
                <p>Noch keine Produkte erfasst?</p>
                <button type="button" name="button" onclick="window.location.href='/artikelErfassen.php'">Erstes Produkt erfassen</button>
            <?php }?>
              <!--Einzelnes Produkt-->
              <?php foreach ($all_products as $product) { ?>
                <a href="<?php echo $base_url ?>/produktseite.php?product_id=<?php echo $product['id'] ?>">
                  <div class="produktbox">
                    <!--Produktbild-->
                    <img class="testbild" src="uploads/files/<?php echo $product['img'] ?>" alt="testbild" style="width:100%">
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

                  </div>
                </a>
              <?php }?>

          </div>


  </div>

</main>
<?php include "footer.php";?>
