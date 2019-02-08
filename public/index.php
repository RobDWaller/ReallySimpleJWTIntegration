<?php

require('../vendor/autoload.php');

use ReallySimpleJWT\Token;
use Carbon\Carbon;

$token = Token::create(1, '!secReT$123*', time() + 30, $_SERVER['HTTP_HOST']);

echo '<h1>Really Simple JWT Integration Test</h1>';

echo '<h2>Get Token</h2>';

echo "<pre>";
var_dump($token);
echo "</pre>";

echo '<p><a href="validate.php?token=' . $token . '">Validate Token</a></p>';

echo '<form method="post" action="postvalidate.php">
<fieldset>
<label>Token</label>
<input name="token" type="text" value="' . $token . '" />
</fieldset>
<fieldset>
<input type="submit" value="Validate">
</fieldset>
</form>';

echo '<p><a href="/advanced.php">Go to Advanced</a></p>';
