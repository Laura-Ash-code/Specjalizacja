<?php 
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role'])) {
    header("Location: "._APP_URL."/app/security/login.php");
    exit();
}

$role = $_SESSION['role']; 

function getParams(&$price,&$rabat,&$operation){
	$price = isset($_REQUEST['price']) ? $_REQUEST['price'] : null;
	$rabat = isset($_REQUEST['rabat']) ? $_REQUEST['rabat'] : null;
	$operation = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;	
}

function validate(&$price,&$rabat,&$operation,&$messages){
	if ( ! (isset($price) && isset($rabat) && isset($operation))) {
		return false;
	}

    if ($price == "") {
        $messages[] = 'Podaj cenę';
    }

    if ($rabat == "") {
        $messages[] = 'Podaj rabat';
    }

    if (count ( $messages ) != 0) return false;

    if (! is_numeric($price)) {
        $messages[] = 'Cena musi być liczbą';
    }
        
    if (! is_numeric($rabat)) {
        $messages[] = 'Rabat musi być liczbą';
    }
    
    if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$price,&$rabat,&$operation,&$messages,&$result){
	global $role;

    $price = intval($price);
	$rabat = intval($rabat);

    if ($rabat < 0 || $rabat > 100) {
        $messages[] = 'Rabat musi być w zakresie 0–100%';
    } 
    if ($role !== 'admin'){
        $messages [] = 'Tylko administrator może robic rabaty!';
    }else {
		$result = $price - ($price * $rabat / 100);
	}
}

$price = null;
$rabat = null;
$operation = null;
$result = null;
$messages = array();

getParams($price,$rabat,$operation);
if ( validate($price,$rabat,$operation,$messages) ) {
	process($price,$rabat,$operation,$messages,$result);
}

include 'rabat_view.php';