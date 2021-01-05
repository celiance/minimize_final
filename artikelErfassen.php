<?php
  session_start();

  require_once('system/config.php');
  require_once('system/data.php');
  include 'header.php';


  if(isset($_POST['product_submit'])){
    $msg = "";
    $product_valid = true;

    if(!empty($_POST['file'])){
      $name = $_POST['file'];
    }else{
      $msg .= "Bitte wähle ein Foto aus.<br>";
      $product_valid = false;
    }

    if(!empty($_POST['product_name'])){
      $product_name = $_POST['product_name'];
    }else{
      $msg .= "Bitte gib eine Produkbezeichnung ein.<br>";
      $product_valid = false;
    }

    if(!empty($_POST['purchase_date'])){
      $purchase_date = $_POST['purchase_date'];
    }else{
      $msg .= "Bitte gib ein Kaufdatum ein.<br>";
      $product_valid = false;
    }

    if(!empty($_POST['description'])){
      $description = $_POST['description'];
    }else{
      $msg .= "Bitte gib eine Beschreibung ein.<br>";
      $product_valid = false;
    }

    // Daten in die Datenbank schreiben test

    if($product_valid){

        $status = "in Gebrauch";
        $result = product_input($img, $product_name, $purchase_date, $description, $status, $user_id);

        if($result){
          unset($_POST);
          $msg = "Du hast das Produkt erfolgreich erfasst.</br>";
          header('Location: https://minimize.celiance.ch/produktseite.php');

        }else{
          $msg .= "Etwas hat nicht geklappt. Versuche es nochmal.</br>";
        }
    }else{
      $alert_type = "alert-warning";
    }
  }

?>

  <!-- MAIN MAIN -->
  <main>
    <div class="main-content">


      <h2>Artikel erfassen</h2>



            <input type="text" id="text-input" />

            <button type = "submit" id="submit_barcode"> Barcode eingeben </button>

            <br/>
            <br/>
            <strong>Kategorie: </strong> <div id="Kategorie"></div><br/>

            <strong>Produktname: </strong> <div id="ProductName"></div><br/>

            <div id="Images">

            </div>
          </div>





      <p>Bitte mache ein Foto von deinem Produkt oder lade eins aus deinem Fotoalbum hoch.</p>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="file" accept="video/*;capture=camcorder" name="file" class="file"><br><br>
        <p>Fülle bitte folgende Felder aus.</p>
          <label for="product_name">Produktbezeichnung</label><br>
          <input type="text" name="product_name" value="" class="product_name"><br>
          <label for="purchase_date">Gekauft am</label><br>
          <input type="date" name="purchase_date" value="" class="purchase_date"><br>
          <label for="description">Beschreibung</label><br>
          <input type="text" name="description" value="" class="description"><br>
          <!--
          <label for="ean">EAN-Code</label><br>
          <input type="text" name="ean" value="" class="ean"><br><br>
          -->
          <button type="submit" name="product_submit" value="erfassen">Erfassen</button>
      </form>
      <?php if(!empty($msg)){ ?>
      <div class="nachricht" role="alert">
        <p><?php echo $msg ?></p>
      </div>
      <?php } ?>
    </div>
  </main>
<?php include 'footer.php';?>


<script type="text/javascript">
//API abfrage
function getAPIdata(barcode) {
    const proxyurl = "https://cors-anywhere.herokuapp.com/"; // Use a proxy to avoid CORS error
    const api_key = "fmpj23pu8g0u19edw824cp26ckxcim";
    const url = proxyurl + "https://api.barcodelookup.com/v2/products?barcode=" + barcode + "&formatted=y&key=" + api_key;
    fetch(url)
            .then(response => response.json())
            .then((data) => {

document.getElementById("ProductName").innerHTML = (data.products[0].product_name);
document.getElementById("Kategorie").innerHTML = (data.products[0].category);
document.getElementById("Images").innerHTML = '<img src="' + (data.products[0].images) + '">';

            })
            .catch(err => {
                throw err
            });
}

document.addEventListener('DOMContentLoaded', function () {
let submit = document.querySelector('#submit_barcode');
submit.addEventListener('click', function(){
  let barcode_input = document.querySelector('#text-input').value;
  getAPIdata(barcode_input);
})
}, false);

</script>
