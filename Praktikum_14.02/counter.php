
<?php
$file = 'count.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current=$current+1;
// Write the contents back to the file
file_put_contents($file, $current);
echo "Lehe kyllastuse arv on: ". $current;

function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 
  return $ipaddress;
}
echo "<br> YOUR IP IS ". get_client_ip_env();

    $host = "localhost";
    $user = "test";
    $pass = "t3st3r123";
    $db = "test";

    $l = mysqli_connect($host, $user, $pass, $db);
    mysqli_query($l, "SET CHARACTER SET UTF8") or
            die("Error, ei saa andmebaasi charsetti seatud");
           
    $sql = "INSERT INTO agrigorj_09_04 (`UserName`, `IPaddress`) VALUES ('kasutaja', '".get_client_ip_env()."')";
    mysqli_query($l, $sql) or die("Error: " . mysqli_error($l));

    mysqli_close($l);

?>
