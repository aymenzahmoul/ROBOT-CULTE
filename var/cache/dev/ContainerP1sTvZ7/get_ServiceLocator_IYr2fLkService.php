<?php

namespace ContainerP1sTvZ7;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_IYr2fLkService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.IYr2fLk' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.IYr2fLk'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'donateur' => ['privates', '.errored..service_locator.IYr2fLk.App\\Entity\\Donateur', NULL, 'Cannot autowire service ".service_locator.IYr2fLk": it references class "App\\Entity\\Donateur" but no such service exists.'],
        ], [
            'donateur' => 'App\\Entity\\Donateur',
        ]);
    }
}
