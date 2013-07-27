<?php

namespace Moriony;

interface ServiceProviderInterface
{
    public function register(ServiceManager $manager);
    public function boot(ServiceManager $manager);
}