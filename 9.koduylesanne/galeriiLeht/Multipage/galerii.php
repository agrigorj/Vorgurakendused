<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Praktikum  - Ülesanne</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php require_once('head.html');?>

<div id="wrap">
	<h3>Fotod</h3>
	<div id="gallery">
<?php
$files = array();
$dir = opendir('pildid'); // open the cwd..also do an err check.
while(false != ($file = readdir($dir))) {
        if(($file != ".") and ($file != "..")) {
                $files[] = $file; // put in array.
        }   
}
natsort($files); // sort.
// print.
foreach($files as $file) {
        echo("<img src='pildid/".$file."' alt='".$file."' />");
}
?>
	</div>
</div>
<?php require_once('foot.html');?>
</html>