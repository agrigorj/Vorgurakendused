<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>11.  praktikum</title>
</head>
<body>
<div><b>Tabel andmebaasis:</b><br>

<?php
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

$sql = "SELECT * FROM loomaaed_agrigorj";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //  output data of each row
    echo "<table border='1'><tr><td>id </td><td>nimi </td><td>vanus </td><td>liik </td><td>puur </td></tr>"; 
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['nimi'] . "</td><td>" . $row['vanus'] . "</td><td>" . $row['liik'] . "</td><td>" . $row['puur'] . "</td></tr>";      }
     echo "</table>";
     } else {
     echo "no results";
}

$conn->close();
?> 
</div>

<p><b>1. Hankida kõigi mingis ühes kindlas puuris elavate loomade nimi ja puuri number:</b><br>

<?php
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

$sql = "SELECT `nimi`, `puur` FROM loomaaed_agrigorj WHERE puur='4'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //  output data of each row
    while($row = $result->fetch_assoc()) {
         echo "<br> nimi: ". $row["nimi"]. " - puur: ". $row["puur"]. "<br>";
     }
     } else {
     echo "no results";
}
$conn->close();
?> 
</p>

<p><b>2. Hankida vanima ja noorima looma vanused:</b><br>

<?php
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

$sql = "SELECT MAX(vanus), MIN(vanus) FROM loomaaed_agrigorj";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //  output data of each row
   while($row = $result->fetch_assoc()) {
         echo "<br> noorim: ".$row["MIN(vanus)"]."-aastane ja vanim: ". $row["MAX(vanus)"]."-aastane.<br>";
     }
     } else {
     echo "no results";
}

$conn->close();
?> 
</p>
<p><b>3. Hankida puuri number koos selles elavate loomade arvuga:</b><br>

<?php
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

$sql = "SELECT puur, COUNT(*) FROM loomaaed_agrigorj GROUP BY puur";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //  output data of each row
   while($row = $result->fetch_assoc()) {
         echo "<br>Puuris nr ".$row["puur"]." elab " .$row["COUNT(*)"]." loom(a).<br>";
     }
     } else {
     echo "no results";
}

$conn->close();
?> 
</p>

<div><b>4. Suurendada kõiki tabelis olevaid vanuseid 1 aasta võrra</b><br>

<form method="post" action="uuenda.php">
<input name="go" type="submit" value="Suurenda vanus" />
</form>
</div>

<p>
 <a href="http://validator.w3.org/check?uri=referer">
  <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>

</p>
</body>
</html>







 
 