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
?>
<div id="wrap">
	<h3>Valiku tulemus</h3>
	<p>
	<?php
	if(!empty($_GET)) {
		if (in_array($_GET['pilt'], $files)) {
    		echo "Aitähh! Sinu hääl salvestatud!";
				}else { echo "ERROR: Wrong value!";}

	}else {
		echo "Kas üldse ei meeldinud? Te ei valinud midagi!";
	
	}
	?>
	
	</p>

</div>
<?php require_once('foot.html');?>
</body>
</html>