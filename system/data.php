<?php

//Datenbankverbindung aufbauen
function get_db_connection(){
	global $db_host, $db_name, $db_user, $db_pass, $db_charset;

	$dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";
	$options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false
	];

	try {
		$db = new PDO($dsn, $db_user, $db_pass, $options);
	} catch (\PDOException $e) {
		throw new \PDOException($e->getMessage(), (int)$e->getCode());
	}

	return $db;
}

//Login Funktion
function login($email, $password){
		$db = get_db_connection();
		$sql = "SELECT * FROM user WHERE email='$email' AND password='$password';";
		$result = $db->query($sql);

		if($result->rowCount() == 1){
			$row = $result->fetch();
			return $row;
		}else{
			return false;
	}
}

//Registrieren Funktion
function register($name, $email, $password){
	$db = get_db_connection();
	$sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?);";
	$stmt = $db->prepare($sql);
	return $stmt->execute(array($name, $email, $password));
}

// Überprüfung, ob die E-Mail-Adresse in der Tabelle users vorhanden ist.
function email_check($email){
	$db = get_db_connection(); // DB-Verbindung herstellen (s. login())
	$sql = "SELECT * FROM user where email = '$email';";
	$result = $db->query($sql);
	if($result->rowCount() > 0){
		return true;
	};
	return false;
}

function get_user_by_id($id){
	$db = get_db_connection();
	$sql = "SELECT * FROM user WHERE id = $id;";
	$result = $db->query($sql);
	return $result->fetch();
}

function product_input($img, $product_name, $purchase_date, $description, $status, $owner_id){
	$db = get_db_connection();
	$sql = "INSERT INTO products (img, product_name, purchase_date, description, status, owner_id ) VALUES (?, ?, ?, ?, ?);";
	$stmt = $db->prepare($sql);
	return $stmt->execute(array($img, $product_name, $purchase_date, $description, $status, $owner_id));
}



function get_product($owner_id){
	$db = get_db_connection();
	$sql = "SELECT * FROM products WHERE owner_id = $owner_id ORDER BY purchase_date;";
	$result = $db->query($sql);
	return $result->fetchAll();
}

function get_product_push($owner_id){
	$db = get_db_connection();
	$sql = "SELECT * FROM products WHERE owner_id = $owner_id AND purchase_date <= DATE_ADD(NOW(),INTERVAL -10 DAY) ORDER BY purchase_date;";
	$result = $db->query($sql);
	return $result->fetchAll();
}

?>
