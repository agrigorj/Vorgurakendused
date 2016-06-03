<?php
require_once('funk.php');
	session_start();
	connect_db();

	$page="pealeht";
	if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
	}

include_once('views/head.html');

switch($page){
	case "login":
		logi();
	break;
	case "projektid":
		kuva_projektid();
	break;
	case "logout":
		logout();
	break;
	case "otsi":
		otsi();
	break;
	case "edit":
		edit();
	break;
	case "lisa":
		lisa();
	break;
	default:
		include_once('views/pealeht.html');
	break;
}

include_once('views/foot.html');

?>