<?php
  session_start();

  require_once('system/config.php');
  require_once('system/data.php');
  include 'header.php';




  if(isset($_POST['product_submit'])){
    $msg = "";
    $product_valid = true;

    if(!empty($_POST['file'])){
      $name = $_POST['file']

      //** WICHTIGE VARIABELN ***************************************
      //name des uploadfelds im formular
      $inputname = 'bildupload';
      //pfad vom file aus ohne / am anfang
      $upload_folder = 'uploads/files/';
      //max dateigrösse in kb
      $filesize = 1000;
      //erlaubte dateiendungen als array
      $allowed_extensions = array('png', 'jpg', 'jpeg', 'gif', 'pdf');
      //true wenn nur bilder, sonst false
      $images = true;
      //** WICHTIGE VARIABELN ***************************************

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
      $new_path = $upload_folder . $filename . '.' . $extension;
      if (file_exists($new_path)) {
      	$id = 1;
      	do {
      		$new_path = $upload_folder . $filename . '_' . $id . '.' . $extension;
      		$id++;
      	} while (file_exists($new_path));
      }
      move_uploaded_file($_FILES[$inputname]['tmp_name'], $new_path);


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

    // Daten in die Datenbank schreiben

    if($product_valid){

        $status = $purchase_date;
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
      <p>Bitte mache ein Foto von deinem Produkt oder lade eins aus deinem Fotoalbum hoch.</p>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" method="post">
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


  <?php } ?>
  </br></br>
      <main>
        <h2>Artikel erfassen</h2>
        <p>Bitte mache ein Foto von deinem Produkt oder lade eins aus deinem Fotoalbum hoch.</p>
        <div class="register">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <input type="file" accept="video/*;capture=camcorder" name="file" class="file"><br><br>


                <p>Fülle bitte folgende Felder aus.</p>
                  <input type="text" name="product_name" value="" class="product_name"><br>
                  <label for="purchase_date">Gekauft am</label><br>
                  <input type="date" name="purchase_date" value="" class="purchase_date"><br>
                  <label for="description">Beschreibung</label><br>
                  <input type="text" name="description" value="" class="description"><br>
              <!--
              <label for="ean">EAN-Code</label><br>
              <input type="text" name="ean" value="" class="ean"><br><br>
              -->
            <button type="submit" name="register_submit" value="registrieren">Erfassen</button>
          </form>

          <?php if(!empty($msg)){ ?>
          <div class="nachricht" role="alert">
            <p><?php echo $msg ?></p>

      </div>
      <?php } ?>
    </div>
  </main>
<?php include 'footer.php';?>
