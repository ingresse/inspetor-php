<?php

require 'vendor/autoload.php';

$inspetor = new Inspetor\Client;
var_dump($inspetor->sendRequest('get', 'http://www.google.com', '/images'));