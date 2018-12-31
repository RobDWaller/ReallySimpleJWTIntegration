<?php

require('../vendor/autoload.php');

use ReallySimpleJWT\Parse;
use ReallySimpleJWT\Validate;
use ReallySimpleJWT\Encode;
use ReallySimpleJWT\Jwt;

echo '<h1>Really Simple JWT Advanced Integration Test</h1>';

echo '<h2>Validate Token</h2>';

echo "<pre>";
var_dump($_GET['token']);
echo "</pre>";

try {
    $jwt = new Jwt($_GET['token'], '!secReT$123*');
    $parse = new Parse($jwt, new Validate(), new Encode());

    $parsed = $parse->validate()
        ->validateExpiration()
        ->validateNotBefore()
        ->parse();

    echo "<pre>";
    var_dump('Token Valid');
    var_dump($parsed->getHeader());
    var_dump($parsed->getPayload());
    echo "</pre>";
}
catch (Exception $e) {
    echo "<pre>";
    var_dump($e->getMessage());
    echo "</pre>";
}

echo '<p><a href="/advanced.php">Back</a></p>';
