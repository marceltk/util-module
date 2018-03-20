<?php

namespace UtilModule;

use Zend\EventManager\EventInterface;

class Module
{
    public function onBootstrap(EventInterface $e)
    {
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

}