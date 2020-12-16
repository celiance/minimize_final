<?php

  include ('header.php');
  $unterscheidung = true;
  $all_products = get_product($user_id);


?>
  <!-- MAIN MAIN -->
  <body class="produktseite">
      <!--Produktanzeige-->
      <div class="produktonly">
        <main>
          <div class="inhaltproduktonly">
              <h3>Stabmixer Super Turbo </h3>
              <img class="testbild" src="assets/testbild.jpg" alt="testbild" width="100">
              <p>hier kommt eine Bescheibung zum Produkt</p>
              <p>Gekauft am </p>
              <p>5.12.12</p>
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
