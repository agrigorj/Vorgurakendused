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
	<h3>Vali oma lemmik :)</h3>
	<form action="tulemus.php" method="GET">
	<?php
$files = array();
$dir = opendir('pildid'); // open the cwd..also do an err check.
while(false != ($file = readdir($dir))) {
        if(($file != ".") and ($file != "..")) {
                $files[] = $file; // put in array.
        }   
}
natsort($files); // sort.
$nr=0;
// print.
foreach($files as $file) {
	$nr++;
        echo("<p>
			<label for='p".$nr."'>
				<img src='pildid/".$file."' alt='".$file."' height='100' />
			</label>
			<input type='radio' value='".$file."' id='p".$nr."' name='pilt'/>
		</p>");
}
?>
		<br/>
		<input type="submit" value="Valin!"/>
	</form>

</div>
<?php require_once('foot.html');?>
</body>
</html>