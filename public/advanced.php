<?php

require('../vendor/autoload.php');

use ReallySimpleJWT\Build;
use ReallySimpleJWT\Validate;
use ReallySimpleJWT\Encode;

$build = new Build('JWT', new Validate(), new Encode());

$token = $build->setPrivateClaim('uid', 12)
    ->setSecret('!secReT$123*')
    ->setExpiration(time() + 30)
    ->setIssuer('localhost')
    ->build();

echo '<h1>Really Simple JWT Advanced Integration Test</h1>';

echo '<h2>Get Token</h2>';

echo "<pre>";
var_dump($token->getToken());
echo "</pre>";

echo '<p><a href="advancedvalidate.php?token=' . $token->getToken() . '">Validate Token</a></p>';

echo '<p><a href="/">Back</a></p>';
