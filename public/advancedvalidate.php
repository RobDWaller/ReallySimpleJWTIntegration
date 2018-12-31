<?php

require('../vendor/autoload.php');

use ReallySimpleJWT\TokenValidator;

echo '<h1>Really Simple JWT Integration Test</h1>';

echo '<h2>Validate Token</h2>';

echo "<pre>";
var_dump($_GET['token']);
echo "</pre>";

try {
    $validator = new TokenValidator();

    $validator->splitToken($_GET['token'])
        ->validateExpiration()
        ->validateSignature('!secReT$123*');

    echo "<pre>";
    var_dump('Token Valid');
    echo "</pre>";
}
catch (Exception $e) {
    echo "<pre>";
    var_dump($e->getMessage());
    echo "</pre>";
}

echo '<p><a href="/advanced.php">Back</a></p>';
