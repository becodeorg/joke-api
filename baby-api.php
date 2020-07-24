<?php
$quantity = min($_GET['quantity'], 1000) ?: 1;

if(isset($_GET['boys'])) {
    $file = 'resources/boys.txt';
} elseif(isset($_GET['girls'])) {
    $file = 'resources/girls.txt';
} else {
    echo file_get_contents('resources/docs.html');
    exit;
}

$names = explode("\n", file_get_contents($file));
$chosenNames = array_rand(array_flip($names), $quantity);



echo json_encode(['names' => (array)$chosenNames], JSON_PRETTY_PRINT);