


<?php
if(isset($_POST['go'])){ // button name
$servername = "localhost";
$username = "test";
$password = "t3st3r123";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
$updt = "UPDATE loomaaed_agrigorj SET vanus=vanus+1";
$result2 = $conn->query($updt);
$conn->close();
}
?>

<script>

  document.location = "paringud.php";

</script>