<?php
require 'vendor/autoload.php';

$response = new \Symfony\Component\HttpFoundation\Response('앗', 400); $response->send();
