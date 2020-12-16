<?php

  include ('header.php');
  $unterscheidung = true;

  if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $product = get_product_by_id($product_id);
    $productname = $product['product_name'];


  }else{
    echo "hier fehlt etwas";
  }


?>
  <!-- MAIN MAIN -->
  <body class="produktseite">
      <!--Produktanzeige-->
      <div class="produktonly">
        <main>
          <div class="inhaltproduktonly">
              <h3><?php echo $product['product_name']; ?></h3>
              <img class="testbild" src="assets/testbild.jpg" alt="testbild" width="100">
              <p><?php echo $product['description']; ?></p>
              <p>Gekauft am:</p>
              <p>
                <?php
                  $date = DateTime::createFromFormat('Y-m-d', $product["purchase_date"]);
                  echo htmlspecialchars($date->format('F Y'), ENT_QUOTES, "UTF-8");
                ?>
              </p>
              <a href="">
                <button class="produktonlyedit">
                  <i class="fas fa-pen"></i>
                </button>
              </a>
          </div>
      </div>

      <div class="quittungbox">
        <a href="">
        <p>Quittung ansehen</p>
          <button>
            <i class="fas fa-arrow-circle-right fa-2x"></i>
          </button>
        </a>
      </div>

    <button class="löschen"type="submit" name="register_submit" value="registrieren">Produkt löschen</button>

    </main>
<?php include 'footer.php';?>
