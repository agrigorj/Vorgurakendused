<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}


function kuva_projektid(){
	
global $connection;	
	
	if(empty($_SESSION["user"])){
		header("Location: ?page=login");
		
	}else{	
	$sql = "SELECT * FROM agrigorj_projektipank";
	$result =mysqli_query($connection, $sql);
	}
	include_once('views/projektid.html');
}

function logi(){
	global $connection;
	if(!empty($_SESSION["user"])){
		header("Location: ?page=projektid");
	}else{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($_POST["user"] == '' || $_POST["pass"] == ''){
				$errors =array();
				if(empty($_POST["user"])) {
					
					$errors[] = "Kasutajanimi puudub!";
				}
				
				if(empty($_POST["pass"]))
					
					$errors[] = "Parooli väli on tühi!";
				}else{
					$u = mysqli_real_escape_string ($connection, $_POST["user"]);
					$p = mysqli_real_escape_string ($connection, $_POST["pass"]);
					$sql = "SELECT id FROM agrigorj_kylastajad WHERE username='$u' AND passw=sha1('$p')";
					$result = mysqli_query($connection, $sql);
					$row = mysqli_num_rows($result);
					if($row){
						$_SESSION["user"] = $_POST["user"];
						header("Location: ?page=projektid");
						
					}else{
						header("Location: ?page=login");
					}
				}				
			}else{
				
			}
		}

	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function lisa(){
		global $connection;
	
	if(empty($_SESSION["user"])){
		header("Location: ?page=login");
	}else{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($_POST["tellija"] == '' || $_POST["nimi"] == '' || $_POST["projektiNr"] == '' || $_POST["sisu"] == '' 
					|| $_POST["projektijuht"] == '' || $_POST["projekteerija"] == '' || $_POST["pikkus"] == '' || $_POST["pindala"] == '' 
					|| $_POST["aasta"] == '' || $_POST["maksumus"] == '' ){
				$errors =array();
				if(empty($_POST["tellija"])) {
					$errors[] = "Sisesta Tellija!";
				}
				if(empty($_POST["nimi"])){
					$errors[] = "Sisesta projekti nimetus!";
				}
				if(empty($_POST["projektiNr"])){
					$errors[] = "Sisesta projekti number!";
				}
				if(empty($_POST["projektijuht"])){
					$errors[] = "Sisesta projektijuhi nimi!";
				}
				if(empty($_POST["projekteerija"])){
					$errors[] = "Sisesta projekteerija nimi!";
				}
				if(empty($_POST["pikkus"])){
					$errors[] = "Sisesta projekteeritud tee pikkust!";
				}
				if(empty($_POST["pindala"])){
					$errors[] = "Sisesta projekteeritud tee pindala!";
				}
				if(empty($_POST["aasta"])){
					$errors[] = "Sisesta projekti aasta!";
				}
				if(empty($_POST["maksumus"])){
					$errors[] = "Sisesta projekti maksumus!";
				}
				}else{
					$tellija = mysqli_real_escape_string ($connection, $_POST["tellija"]);
					$nimi = mysqli_real_escape_string ($connection, $_POST["nimi"]);
					$projektiNr = $_POST["projektiNr"];
					$projektijuht = mysqli_real_escape_string ($connection, $_POST["projektijuht"]);
					$projekteerija = mysqli_real_escape_string ($connection, $_POST["projekteerija"]);
					$pikkus = $_POST["pikkus"];
					$pindala = $_POST["pindala"];
					$aasta = $_POST["aasta"];
					$maksumus = $_POST["maksumus"];
					$sisu = mysqli_real_escape_string ($connection, $_POST["sisu"]);
					$link = mysqli_real_escape_string ($connection, $_POST["link"]);					
					$sql = "INSERT INTO agrigorj_projektipank (tellija, nimi, projektiNr, sisu, projektijuht, projekteerija, pikkus, pindala, aasta, maksumus, link) VALUES ('$tellija','$nimi', '$projektiNr', '$sisu', '$projektijuht', '$projekteerija', '$pikkus', '$pindala','$aasta','$maksumus','$link')";
					$result = mysqli_query($connection, $sql);
					$id = mysqli_insert_id($connection);
					if($id){
						header("Location: ?page=projektid");
					}else{
						header("Location: ?page=projektivorm");
					}
				}
			}
		}
	
	include_once('views/projektivorm.html');
}
function otsi(){
		global $connection;
	
	if(empty($_SESSION["user"])){
		header("Location: ?page=login");
	}else{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($_GET["name"] == '' && $_GET["type"] == '' && $_GET["manager"] == ''&& $_GET["designer"] == ''&& $_GET["length"] == ''&& $_GET["area"] == ''&& $_GET["year"] == ''&& $_GET["price"] == '' ){
				$errors =array();
				$errors[] = "Vali vähemalt üks parameeter!";
				}else{
				
						
}
					
				}
				
			}
		
	
	include_once('views/otsivorm.html');
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>