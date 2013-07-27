<?php

use Moriony\ServiceManager;

require_once "../vendor/autoload.php";

$manager = new ServiceManager;

$manager['protected_callable'] = $manager->protect(function() {
    return 'Hello world!';
});

echo $manager['protected_callable']();