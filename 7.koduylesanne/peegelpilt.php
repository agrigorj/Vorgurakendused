<!DOCTYPE html>
<html>
<body>
<head>
	<meta charset="utf-8" />
	<title>Seitsmes praktikum</title>
</head>
<h1>7. nädal, 1. ülesanne</h1>


<p><?php
$x = "Hello world!";
echo "Sisseehitatud funktsioon: " , $x , " --> ";
echo strrev($x);
?> 
</p>

<p><?php
function Reverse($x) {
	$a='';
	$i=0;
		for ($i = strlen($x)-1; $i >-1;  $i--) {
   		$a.=$x[$i];  
	}
	echo $a;
} 
echo "Minu funktsioon: ","Tere, maailm! --> ", Reverse("Tere, maailm!");
?> 
</p>

<p><?php
function Reverse2($x) {
	$a='';
	$i=0;
	for ($i = 1; $i <=strlen($x);  $i++) {
   	$a.= substr($x,-$i, 1);  
	} 
	echo $a;
}
echo "Minu funktsioon2: ","ABCD --> ", Reverse2("ABCD");
?> 
</p>


</body>
</html> 