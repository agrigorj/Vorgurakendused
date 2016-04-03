<!DOCTYPE html>
<html>
<body>
<head>
	<meta charset="utf-8" />
	<title>Seitsmes praktikum</title>
</head>
<h1>7. nädal, 3. ülesanne</h1>

<p><?php
$autod= array(
					array('mark'=> 'Audi', 'värv'=>'must', 'vanus'=>5, 'läbisõit' =>'130 000','hind'=>'10 000'),
					array('mark'=> 'BMW', 'värv'=>'punane', 'vanus'=>7, 'läbisõit' =>'190 000','hind'=>'15 000'),
					array('mark'=> 'Opel', 'värv'=>'sinine', 'vanus'=>3, 'läbisõit' =>'40 000','hind'=>'8 000'),
					array('mark'=> 'Mazda', 'värv'=>'hõbedane', 'vanus'=>8, 'läbisõit' =>'95 000','hind'=>'9 500'),
					array('mark'=> 'Fiat', 'värv'=>'valge', 'vanus'=>4, 'läbisõit' =>'100 000','hind'=>'4 000')
				
		);
	foreach ($autod as $values) {
	include 'incl.html';
}

?> 
</p>

</body>
</html> 