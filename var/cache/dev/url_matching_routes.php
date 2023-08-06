<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'app_admin', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null]],
        '/contribution' => [[['_route' => 'app_contribution', '_controller' => 'App\\Controller\\ContributionController::index'], null, null, null, false, false, null]],
        '/donateur' => [[['_route' => 'app_donateur', '_controller' => 'App\\Controller\\DonateurController::index'], null, null, null, false, false, null]],
        '/information' => [[['_route' => 'app_information', '_controller' => 'App\\Controller\\InformationController::index'], null, null, null, false, false, null]],
        '/maison/de/culte' => [[['_route' => 'app_maison_de_culte', '_controller' => 'App\\Controller\\MaisonDeCulteController::index'], null, null, null, false, false, null]],
        '/projet' => [[['_route' => 'app_projet', '_controller' => 'App\\Controller\\ProjetController::index'], null, null, null, false, false, null]],
        '/role' => [[['_route' => 'app_role', '_controller' => 'App\\Controller\\RoleController::index'], null, null, null, false, false, null]],
        '/statut' => [[['_route' => 'app_statut', '_controller' => 'App\\Controller\\StatutController::index'], null, null, null, false, false, null]],
        '/utlisateur' => [[['_route' => 'app_utlisateur', '_controller' => 'App\\Controller\\UtlisateurController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
