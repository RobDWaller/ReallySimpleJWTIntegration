<?php

require('../vendor/autoload.php');

use ReallySimpleJWT\Token;

echo '<h1>Really Simple JWT Integration Test</h1>';

echo '<h2>Post Validate Token</h2>';

echo "<pre>";
var_dump($_POST['token']);
echo "</pre>";

try {
	$token = Token::validate($_POST['token'], '!secReT$123*');

	echo "<pre>";
	var_dump($token);
    var_dump(Token::getHeader($_POST['token'], '!secReT$123*'));
    var_dump(Token::getPayload($_POST['token'], '!secReT$123*'));
	echo "</pre>";
}
catch (Exception $e) {
	echo "<pre>";
	var_dump($e->getMessage());
	echo "</pre>";
}

echo '<p><a href="/">Back</a></p>';
