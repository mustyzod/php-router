<?php

include_once 'Request.php';
include_once 'Router.php';

$router = new Router(new Request);

// Non params example
$router->get('/', function () {
  return <<<HTML
    <h1>Index</h1>
HTML;
});

$router->get('/profile', function () {
  return <<<HTML
    <h1>Profile</h1>
HTML;
});

// Params example [API endpoint example]
$router->get('/user/{username}', function ($request) {
  $users = [
    'faith' => [
      'name' => 'Faith',
      'phone' => '09063519643'
    ],
    'sommie' => [
      'name' => 'Sommie',
      'phone' => '08101602475'
    ],
  ];

  return json_encode($users[$request->params->username]);
});

// Multiple params example [HTML example]
$router->get('/user/{username}/address/{addressname}', function ($request) {
  $username = $request->params->username;
  $address = $request->params->addressname;

  return <<<HTML
    <h1>$username stays at $address</h1>
HTML;
});
