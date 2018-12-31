<?php

require('../vendor/autoload.php');

use ReallySimpleJWT\TokenBuilder;
use Carbon\Carbon;

$tokenBuilder = new TokenBuilder();

$token = $tokenBuilder->addPayload(["key" => "userId", "value" => 12])
    ->addPayload(["key" => "firstName", "value" => 'John'])
    ->addPayload(["key" => "lastName", "value" => 'Smith'])
    ->addPayload(["key" => "email", "value" => 'john@smith.com'])
    ->addPayload(["key" => "role", "value" => 'admin'])
    ->addPayload(["key" => "phone", "value" => '07945987234'])
    ->setSecret("@NFmuyc9k*Ia")
    ->setExpiration(time() + 30)
    ->setIssuer("127.0.0.1")
    ->build();

var_dump($token);

echo json_encode($token);
