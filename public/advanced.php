<?php

require('../vendor/autoload.php');

use ReallySimpleJWT\Build;
use ReallySimpleJWT\Helper\Validator;
use ReallySimpleJWT\Encoders\EncodeHs256;
use ReallySimpleJWT\Secret;

$build = new Build('JWT', new Validator(), new Secret(), new EncodeHs256());

$token = $build->setContentType('JWT')
    ->setHeaderClaim('info', 'foo')
    ->setSecret('!secReT$123*')
    ->setIssuer('localhost')
    ->setSubject('admins')
    ->setAudience('https://google.com')
    ->setExpiration(time() + 300)
    ->setNotBefore(time() - 30)
    ->setIssuedAt(time())
    ->setJwtId('123ABC')
    ->setPayloadClaim('uid', 12)
    ->build();

echo '<h1>Really Simple JWT Advanced Integration Test</h1>';

echo '<h2>Get Token</h2>';

echo '<h3>Success!!</h3>';

echo "<pre>";
var_dump($token->getToken());
echo "</pre>";

echo '<p><a href="advancedvalidate.php?token=' . $token->getToken() . '">Validate Token</a></p>';

echo '<h3>Fail!!</h3>';

$tokenFail = $build->reset()
    ->setContentType('JWT')
    ->setHeaderClaim('info', 'foo')
    ->setSecret('!secReT$123*')
    ->setJwtId('123ABC')
    ->setPayloadClaim('exp', time() - 30)
    ->build();

echo "<pre>";
var_dump($tokenFail->getToken());
echo "</pre>";

echo '<p><a href="advancedvalidate.php?token=' . $tokenFail->getToken() . '">Validate Token</a></p>';

echo '<p><a href="/">Back</a></p>';
