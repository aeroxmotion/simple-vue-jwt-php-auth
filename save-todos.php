<?php

require_once __DIR__ . '/vendor/autoload.php';

use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;

$token = (new Parser())->parse(getallheaders()['authorization']);

$todo = json_decode(file_get_contents('php://input'));

if ($token->verify(new Sha256(), 'fasasfkl1h21rk24h14h4g214g')) {
  // Guardar todo
} else {
  exit('Token inválido');
}
