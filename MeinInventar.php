<?php

  include ('header.php');
  $unterscheidung = true;
  $all_products = get_product();

?>


  <body class="inventar">
    <section class="inventar navbackground">

        <main>
            <h2>Mein Inventar</h2>
            <div class="container">
	             <div class="searchbox">
		               <input type="text"placeholder="Suche">
		                 <span></span>
	             </div>
            </div>
            <div class="alle_produkte">
              <?php foreach ($all_products as $product) { ?>

              <div class="produktbox">

                  <a href="/produktseite.php">
                    <img class="testbild" src="assets/testbild.jpg" alt="testbild" style="width:100%">
                  </a>


              <div class="alerttext">
                  <p><?php echo $product['product_name']; ?></p>
                  <h6><?php echo $product['purchase_date']; ?></h6>
              </div>

              <div class="alertbutton">
                <span> 1 </span>
              </div>
              <?php }?>
            </div>
          </div>


  </div>

</main>
<?php include "footer.php";?>
