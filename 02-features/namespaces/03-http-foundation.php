<?php
require 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response as Res;

$r = new Res('앗', 400);
$r->send();
