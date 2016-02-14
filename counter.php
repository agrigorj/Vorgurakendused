
<?php
$file = 'count.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current=$current+1;
// Write the contents back to the file
file_put_contents($file, $current);
echo "Lehe kyllastuse arv on: ". $current;
?>
