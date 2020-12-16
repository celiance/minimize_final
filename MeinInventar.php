<?php

  include ('header.php');
  $unterscheidung = true;
  $all_products = get_product($user_id);

?>


  <body class="inventar">
    <section class="inventar navbackground">

        <main>
            <h2>Mein Inventar</h2>
            <div class="container">
            <!--Suchfeld-->
	             <div class="searchbox">
		               <input type="text"placeholder="Suche">
		                 <span></span>
	             </div>
            </div>
            <!--Alle Produkte-->
            <div class="container">
              <!--Einzelnes Produkt-->
              <?php foreach ($all_products as $product) { ?>
                <a href="/produktseite.php">
                  <div class="produktbox">
                    <!--Produktbild-->
                    <img class="testbild" src="assets/testbild.jpg" alt="testbild" style="width:100%">
                    <!--Angaben Produkt-->
                    <div class="alerttext">
                        <p><?php echo $product['product_name']; ?></p>
                        <h6><?php echo $product['purchase_date']; ?></h6>
                    </div>
                    <div class="alertbutton">
                      <span> 1 </span>
                    </div>
                  </div>
                </a>
              <?php }?>

          </div>


  </div>

</main>
<?php include "footer.php";?>
