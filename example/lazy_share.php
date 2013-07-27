<?php

use Moriony\ServiceManager;

require_once "../vendor/autoload.php";

$manager = new ServiceManager;

$manager['lazy_shared_service'] = $manager->share(function() {
    return 'Hello world!';
});

echo $manager['lazy_shared_service'];