<?php

namespace ContainerP1sTvZ7;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_S4EqzCzService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.S4EqzCz' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.S4EqzCz'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'maisonDeCulte' => ['privates', '.errored..service_locator.S4EqzCz.App\\Entity\\MaisonDeCulte', NULL, 'Cannot autowire service ".service_locator.S4EqzCz": it references class "App\\Entity\\MaisonDeCulte" but no such service exists.'],
        ], [
            'entityManager' => '?',
            'maisonDeCulte' => 'App\\Entity\\MaisonDeCulte',
        ]);
    }
}
