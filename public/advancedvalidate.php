<?php

require('../vendor/autoload.php');

use ReallySimpleJWT\Parse;
use ReallySimpleJWT\Validate;
use ReallySimpleJWT\Helper\Validator;
use ReallySimpleJWT\Decoders\DecodeHs256;
use ReallySimpleJWT\Encoders\EncodeHs256;
use ReallySimpleJWT\Jwt;
use ReallySimpleJWT\Signature;

echo '<h1>Really Simple JWT Advanced Integration Test</h1>';

echo '<h2>Validate Token</h2>';

echo "<pre>";
var_dump($_GET['token']);
echo "</pre>";

try {
    $jwt = new Jwt($_GET['token'], '!secReT$123*');
    $parse = new Parse($jwt, new DecodeHs256());
    $validate = new Validate(
        $parse, 
        new Signature(
            new EncodeHs256()
        ), 
        new Validator()
    );

    $validate->validate()
        ->expiration()
        ->notBefore();

    $parsed = $parse->parse();

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
