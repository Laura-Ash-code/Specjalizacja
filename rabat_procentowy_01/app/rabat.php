<?php 
require_once dirname(__FILE__).'/../config.php';

$messages = []; 
$price = isset($_REQUEST['price']) ? $_REQUEST['price'] : null;
$rabat = isset($_REQUEST['rabat']) ? $_REQUEST['rabat'] : null;

if ($price === null || $rabat === null) {
    $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ($price === "") {
    $messages[] = 'Podaj cenę';
}
if ($rabat === "") {
    $messages[] = 'Podaj rabat';
}

if (empty($messages)) {
    if (!is_numeric($price)) {
        $messages[] = 'Cena musi być liczbą';
    }
    if (!is_numeric($rabat)) {
        $messages[] = 'Rabat musi być liczbą';
    }
}

if (empty($messages)) {
    $price = floatval($price);
    $rabat = floatval($rabat);

    if ($rabat < 0 || $rabat > 100) {
        $messages[] = 'Rabat musi być w zakresie 0–100%';
    } else {
        $result = $price - ($price * $rabat / 100);
    }
}

include 'rabat_view.php';
