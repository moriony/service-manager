<?php

namespace Moriony;

class ServiceManager extends \Pimple
{
    /**
     * @var ServiceProviderInterface[]
     */
    protected $providers = array();
    protected $booted = false;

    public function register(ServiceProviderInterface $provider, array $values = array())
    {
        $this->providers[] = $provider;
        $provider->register($this);
        foreach ($values as $key => $value) {
            $this[$key] = $value;
        }
        return $this;
    }

    public function boot()
    {
        if (!$this->booted) {
            foreach ($this->providers as $provider) {
                $provider->boot($this);
            }
            $this->booted = true;
        }
    }
}