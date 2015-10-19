<?php
require 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

$response = new Response('앗', 400);
$response->send();
