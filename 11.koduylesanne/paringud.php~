<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Esimene praktikum</title>
</head>
<body>
<p><b>Tabel andmebaasis:</b><br>

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
     echo $result;
}

$conn->close();
?> 
</p>

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
     echo $result;
}

$conn->close();
?> 
</p>