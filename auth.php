<?php

require_once __DIR__ . '/vendor/autoload.php';

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $credentials = json_decode(file_get_contents('php://input'));

  if ($credentials->username === 'admin' && $credentials->password === '123') {
    $builder = new Builder();

    $token = $builder->setExpiration(time() + 3600)
                     ->set('uid', 123)
                     ->set('name', 'Administrador')
                     ->sign(new Sha256(), 'fasasfkl1h21rk24h14h4g214g')
                     ->getToken();

    echo $token;
  }
}
