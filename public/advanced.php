<?php

require('../vendor/autoload.php');

use ReallySimpleJWT\Build;
use ReallySimpleJWT\Validate;
use ReallySimpleJWT\Encode;
use ReallySimpleJWT\Secret;

$build = new Build('JWT', new Validate(), new Secret(), new Encode());

$token = $build->setContentType('JWT')
    ->setHeaderClaim('info', 'foo')
    ->setSecret('!secReT$123*')
    ->setIssuer('localhost')
    ->setSubject('admins')
    ->setAudience('https://google.com')
    ->setExpiration(time() + 30)
    ->setNotBefore(time() - 30)
    ->setIssuedAt(time())
    ->setJwtId('123ABC')
    ->setPayloadClaim('uid', 12)
    ->build();

echo '<h1>Really Simple JWT Advanced Integration Test</h1>';

echo '<h2>Get Token</h2>';

echo "<pre>";
var_dump($token->getToken());
echo "</pre>";

echo '<p><a href="advancedvalidate.php?token=' . $token->getToken() . '">Validate Token</a></p>';

echo '<p><a href="/">Back</a></p>';
