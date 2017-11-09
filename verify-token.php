<?php

require_once __DIR__ . '/vendor/autoload.php';

use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;

$token = (new Parser())->parse($_GET['token']);

echo json_encode([
  'isValidToken' => $token->verify(
    new Sha256(),
    'fasasfkl1h21rk24h14h4g214g'
  )
]);
