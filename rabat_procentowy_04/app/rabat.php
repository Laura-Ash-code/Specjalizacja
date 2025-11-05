<?php 
require_once dirname(__FILE__).'/../config.php';

$price = isset($_REQUEST['price']) ? $_REQUEST['price'] : null;
$rabat = isset($_REQUEST['rabat']) ? $_REQUEST['rabat'] : null;
$operation = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;	

$hide_intro = false;

if ( isset($_REQUEST['price']) && isset($_REQUEST['rabat']) ) {
	$hide_intro = true;

	$infos [] = 'Przekazano parametry.';

    if ($price == "") {
        $messages[] = 'Podaj cenę';
    }

    if ($rabat == "") {
        $messages[] = 'Podaj rabat';
    }

    if ( !isset ( $messages ) ) {

        if (! is_numeric($price)) {
            $messages[] = 'Cena musi być liczbą';
        }
            
        if (! is_numeric($rabat)) {
            $messages[] = 'Rabat musi być liczbą';
        }
    }

    if ( !isset ( $messages ) ) { 
		
		$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';

        $price = intval($price);
        $rabat = intval($rabat);

        if ($rabat < 0 || $rabat > 100) {
            $messages[] = 'Rabat musi być w zakresie 0–100%';
        } else {
            $result = $price - ($price * $rabat / 100);
        }
    }
}

$page_title = 'Kalkulator rabatow';
$page_description = 'kalkulator do obliczania ceny po odliczeniu rabatu ';
$page_header = 'Kalkulator rabatow';
$page_footer = 'Jak nie dziala to nie nasza wina </br> Strona tylko dla mądrych użytkowników';

include 'rabat_view.php';