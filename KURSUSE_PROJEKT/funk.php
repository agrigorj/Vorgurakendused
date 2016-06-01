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
						$errors[] = "Vale kasutajanimi ja/või";
						
						
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
				?>
				<script>
   				alert("Tärniga väljad on kohustuslikud!");
				</script>
				<?php
				if(empty($_POST["tellija"])) {
					$errors[] = "Sisesta Tellija!";
				}
				if(empty($_POST["nimi"])){
					$errors[] = "Sisesta projekti nimetus!";
				}
				if(empty($_POST["projektiNr"])){
					$errors[] = "Sisesta projekti number!";
				}
					if(empty($_POST["sisu"])){
					$errors[] = "Sisesta projekti sisu!";
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
			if($_POST["name"] == '' && $_POST["manager"] == ''&& $_POST["designer"] == ''&& $_POST["length"] == ''&& $_POST["area"] == ''&& $_POST["year"] == ''&& $_POST["price"] == '' && $_POST["type"] == ''){
				$errors =array();
				
				?>
				<script>
   				alert("Valige vähemalt üks parameeter!");
				</script>
				<?php
				}else{
					if(!empty($_POST["manager"])) {
						$projektijuht = mysqli_real_escape_string ($connection, $_POST["manager"]);
						$sql = "SELECT * FROM agrigorj_projektipank WHERE lower(projektijuht)  LIKE '%{$projektijuht}%' "  ;
					}
					if(!empty($_POST["year"])) {
						$aasta = $_POST["year"];
						$sql = "SELECT * FROM agrigorj_projektipank WHERE aasta='$aasta'";
					}
					if(!empty($_POST["name"])) {
						$nimi = mysqli_real_escape_string ($connection, $_POST["name"]);
						$sql = "SELECT * FROM agrigorj_projektipank WHERE lower(nimi)LIKE'%{$nimi}%'";
					}
					if(!empty($_POST["designer"])) {
						$projekteerija = mysqli_real_escape_string ($connection, $_POST["designer"]);
						$sql = "SELECT * FROM agrigorj_projektipank WHERE lower(projekteerija) LIKE'%{$projekteerija}%'";
					}
					if(!empty($_POST["length"])) {
						$pikkus = $_POST["length"];
						$sql = "SELECT * FROM agrigorj_projektipank WHERE pikkus>'$pikkus'";
					}
						
					if(!empty($_POST["area"])) {
						$pindala = $_POST["area"];
						$sql = "SELECT * FROM agrigorj_projektipank WHERE pindala>'$pindala'";
					}
						
					if(!empty($_POST["price"])) {
						$maksumus = $_POST["price"];
						$sql = "SELECT * FROM agrigorj_projektipank WHERE maksumus >'$maksumus'";
					}
						
					if(!empty($_POST["type"])) {
						$sisu = mysqli_real_escape_string ($connection, $_POST["type"]);	
						$sql = "SELECT * FROM agrigorj_projektipank WHERE sisu='$sisu'";
					}

					$result =mysqli_query($connection, $sql);
				   
					
				}
				
			}
		
	
	include_once('views/otsivorm.html');
		}
}


?>