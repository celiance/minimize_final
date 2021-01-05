<?php

  include ('header.php');
  include ('login-wall.php');
  $unterscheidung = true;

  $push_products = get_product_push($user_id);


  if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $product = get_product_by_id($product_id);
    $product_id = $product['id'];
  }else{
    echo "hier fehlt etwas";
  }

  if(isset($_POST['behalten_submit'])){
    update_status($_POST['product_id']);
    header('Location: /produktseite.php?product_id=' . $_POST['product_id']);
  }



?>
  <!-- MAIN MAIN -->
  <body class="produktseite">
    <?php
     if($status){
        echo "yessss";
      }else{
        echo "kein Inhalt im Status!!!!!";
      } ?>
      <!--Produktanzeige-->
      <div class="produktonly">
        <main>
          <div class="inhaltproduktonly">
              <h3><?php echo $product['product_name']; ?></h3>
              <img class="testbild" src="uploads/files/<?php echo $product['img'] ?>" alt="testbild" width="100">
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
          <div class="alertbutton">
            <i class="far fa-bell"></i>
          </div>
      </div>

      <!--Buttons werden nur angezeigt, wenn der Push aktiv ist-->
      <?php
      foreach ($push_products as $push_prod) {
        $push_prod_id = $push_prod['id'];
              if($push_prod_id == $product_id){?>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                  <div class"buttonalert">
                    <input type="hidden" name="product_id" value="<?php echo $product[id]; ?>">
                    <button class="löschenalert" type="submit" name="verkaufen_submit" value="">Nö, besser verkaufen!</button>
                    <button class="artikelbehalten" type="submit" name="behalten_submit" value="">Artikel behalten!</button>
                  </div>
                </form>
      <?php }}?>

      <!--
      <div class="quittungbox">
        <a href="">
        <p>Quittung ansehen</p>
          <button>
            <i class="fas fa-arrow-circle-right fa-2x"></i>
          </button>
        </a>
      </div>
      -->

      <button class="löschen"type="submit" name="register_submit" value="registrieren">Produkt löschen</button>

    </main>
<?php include 'footer.php';?>
