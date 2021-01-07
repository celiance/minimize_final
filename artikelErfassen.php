<?php
  session_start();

  require_once('system/config.php');
  require_once('system/data.php');
  include 'header.php';


  if(isset($_POST['product_submit'])){
    $msg = "";
    $product_valid = true;

    if(isset($_FILES['bildfile'])){
      $name = $_FILES['bildfile'];


            //** DATEIUPLOAD DATEIUPLOAD **
            //name des uploadfelds im formular
            $inputname = 'bildfile';
            //pfad vom file aus ohne / am anfang
            $upload_folder = 'uploads/files/';
            //max dateigrösse in kb
            $filesize = 10000;
            //erlaubte dateiendungen als array
            $allowed_extensions = array('png', 'jpg', 'jpeg', 'gif', 'pdf');
            //true wenn nur bilder, sonst false
            $images = true;

            //** WICHTIGE VARIABELN *
            $filename = pathinfo($_FILES[$inputname]['name'], PATHINFO_FILENAME);
            $extension = strtolower(pathinfo($_FILES[$inputname]['name'], PATHINFO_EXTENSION));
            if (!in_array($extension, $allowed_extensions)) {
            	die("Ungültige Dateiendung.");
            }
            if ($_FILES[$inputname]['size'] > ($filesize * 1024)) {
            	die("Datei zu gross.");
            }
            if ($images) {
            	if (function_exists('exif_imagetype')) {
            		$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            		$detected_type = exif_imagetype($_FILES[$inputname]['tmp_name']);
            			if (!in_array($detected_type, $allowed_types)) {
            				die("Nur der Upload von Bilddateien ist gestattet");
            		}
            	}
            }


    }else{
      $msg .= "Bitte wähle ein Foto aus.<br>";
      $product_valid = false;
    }

    /*QUITTUNG QUITTUNG QUITTUNG*/
    /*QUITTUNG QUITTUNG QUITTUNG*/
    /*QUITTUNG QUITTUNG QUITTUNG*/
    if(isset($_FILES['quittung'])){
      $name_q = $_FILES['quittung'];


            //** DATEIUPLOAD DATEIUPLOAD **
            //name des uploadfelds im formular
            $inputname_q = 'quittung';
            //pfad vom file aus ohne / am anfang
            $upload_folder_q = 'uploads/files/';
            //max dateigrösse in kb
            $filesize_q = 10000;
            //erlaubte dateiendungen als array
            $allowed_extensions_q = array('png', 'jpg', 'jpeg', 'gif', 'pdf');
            //true wenn nur bilder, sonst false
            $images_q = true;

            //** WICHTIGE VARIABELN **
            $filename_q = pathinfo($_FILES[$inputname_q]['name'], PATHINFO_FILENAME);
            $extension_q = strtolower(pathinfo($_FILES[$inputname_q]['name'], PATHINFO_EXTENSION));
            if (!in_array($extension_q, $allowed_extensions_q)) {
            	die("Ungültige Dateiendung.");
            }
            if ($_FILES[$inputname_q]['size'] > ($filesize_q * 1024)) {
            	die("Datei zu gross.");
            }
            if ($images_q) {
            	if (function_exists('exif_imagetype')) {
            		$allowed_types_q = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            		$detected_type_q = exif_imagetype($_FILES[$inputname_q]['tmp_name']);
            			if (!in_array($detected_type_q, $allowed_types_q)) {
            				die("Nur der Upload von Bilddateien ist gestattet");
            		}
            	}
            }

    }else{
      $msg .= "Du kannst eine Quittung hochladen.";
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

    if(!empty($_POST['price'])){
      $price = $_POST['price'];
    }else{
      $msg .= "Bitte gib ein Preis ein.<br>";
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
        $result = product_input($img, $product_name, $purchase_date, $price, $description, $quittung, $status, $user_id);
        /*Bilddatei*/
        /*Bilddatei*/
        /*Bilddatei*/
          $new_path = $upload_folder . $filename . '.' . $extension;
          $dateiname = $filename . '.' . $extension;
          if (file_exists($new_path)) {
            $id = 1;
            do {
              $new_path = $upload_folder . $filename . '_' . $id . '.' . $extension;
              $dateiname = $filename . '_' . $id . '.' . $extension;
              $id++;
            } while (file_exists($new_path));
          }
          move_uploaded_file($_FILES[$inputname]['tmp_name'], $new_path);

          /*QUITTUNG QUITTUNG QUITTUNG*/
          /*QUITTUNG QUITTUNG QUITTUNG*/
          /*QUITTUNG QUITTUNG QUITTUNG*/
          $new_path_q = $upload_folder_q . $filename_q . '.' . $extension_q;
          $dateiname_q = $filename_q . '.' . $extension_q;
          if (file_exists($new_path_q)) {
            $id_q = 1;
            do {
              $new_path_q = $upload_folder_q . $filename_q . '_' . $id_q . '.' . $extension_q;
              $dateiname_q = $filename_q . '_' . $id_q . '.' . $extension_q;
              $id_q++;
            } while (file_exists($new_path_q));
          }
          move_uploaded_file($_FILES[$inputname_q]['tmp_name'], $new_path_q);

        $result = product_input($dateiname, $product_name, $purchase_date, $price, $description, $dateiname_q, $purchase_date, $user_id);

        if($result){
          unset($_POST);
          $msg = "Du hast das Produkt erfolgreich erfasst.</br>";
          header('Location: https://minimize.celiance.ch/MeinInventar.php');

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


     <!--Manuell Erfassen-->
     <p>Bitte mache ein Foto von deinem Produkt oder lade eins aus deinem Fotoalbum hoch.</p>
     <form action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" method="post">

       <?php if(!empty($msg)){ ?>
       <div class="nachricht" role="alert">
       <p><?php echo $msg ?></p>
       <?php } ?>

       <input type="file" name="bildfile" class="file" id="file"><br><br>

       <!--Barcode-->
       <p>Alternativ kannst du hier den Barcode eingeben:</p>
       <input type="text" id="text-input">
       <button type="submit" id="submit_barcode">Barcode eingeben</button>
       <br/>
       <br/>
       <strong>Kategorie: </strong> <div id="Kategorie"></div><br/>
       <strong>Produktname: </strong> <div id="ProductName"></div><br/>
       <div id="Images">

         <label for="product_name">Produktbezeichnung</label><br>
         <input type="text" name="product_name" value="" class="product_name"><br>
         <label for="purchase_date">Gekauft am</label><br>
         <input type="date" name="purchase_date" value="" class="purchase_date"><br>
         <label for="price">Einkaufspreis</label><br>
         <input type="number" name="price" value="" class="price"><br>
         <label for="description">Beschreibung</label><br>
         <input type="text" name="description" value="" class="description"><br>
         <input type="file" name="quittung" class="file" id="file"><br><br>
         <!--
         <label for="ean">EAN-Code</label><br>
         <input type="text" name="ean" value="" class="ean"><br><br>
         -->
         <button type="submit" name="product_submit" value="erfassen">Erfassen</button>
     </form>


     </br>
     </br>
     </br>
     </br>
     </br>
     </br>

     </div>
   </div>

   <?php
     $unterscheidungfooter = true;
   ?>

   <?php include 'footer.php';?>

   <script type="text/javascript">

   //API abfrage
   function getAPIdata(barcode) {
       const proxyurl = "https://cors-anywhere.herokuapp.com/"; // Use a proxy to avoid CORS error
       const api_key = "qp9rkiydw0cqfzvhs9ukm65rji68u0";
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
