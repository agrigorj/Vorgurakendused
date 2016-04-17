<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Praktikum  - Ülesanne</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php require_once('head.html');?>
<?php
$files = array();
$dir = opendir('pildid'); // open the cwd..also do an err check.
while(false != ($file = readdir($dir))) {
        if(($file != ".") and ($file != "..")) {
                $files[] = $file; // put in array.
        }   
}
natsort($files);
?>
<?php

if(!empty($_GET)) {
$pg=$_GET['page'];
}else {$pg="pealeht";
}
switch($pg) {
	case "galerii":
		require_once('galerii.html');
		break;
	case "vote":
		require_once('vote.html');
		break;
	case "pealeht":
		require_once('pealeht.html');
		break;
	case "tulemus":
		require_once('tulemus.html');
		break;}

?>
<?php require_once('foot.html');?>
</body>
</html>