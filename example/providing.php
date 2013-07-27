<?php

use Moriony\ServiceManager;
use Moriony\ServiceProviderInterface;

require_once "../vendor/autoload.php";

class ExampleServiceProvider implements ServiceProviderInterface
{
    public function register(ServiceManager $manager)
    {
        $manager['example'] = $manager->share(function() use($manager) {
            return $manager['example.options.message'];
        });
    }

    public function boot(ServiceManager $manager)
    {}
}

$manager = new ServiceManager;
$manager->register(new ExampleServiceProvider, array(
    'example.options.message' => 'Hello world!'
));
echo $manager['example'];

