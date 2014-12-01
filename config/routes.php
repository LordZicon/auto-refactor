<?php
return [
    'default' => '/page',
    'errors' => '/error/:code',
    'routes' => [
        '/zoeken(/:action(/:id))' => [
            'controller' => 'Controller_Occasion',
            'action' => 'search',
        ],
        '/page(/:action(/:id))' => [
            'controller' => 'Controller_Page',
            'action' => 'index',
        ],
        '/admin/login' => [
            'controller' => 'Controller_Auth',
            'action' => 'login',
        ],
        '/admin/logout' => [
            'controller' => 'Controller_Auth',
            'action' => 'logout',
        ],
        // '/admin/' => [
        //     'controller' => 'Controller_Admin_Page',
        //     'action' => 'index',
        // ],
        '/admin/:controller(/:action(/:id))' => [
            'controller' => 'Controller_Admin_:controller',
            'action' => 'index',
        ],
        '/admin' => [
            'controller' => 'Controller_Admin_Page',
            'action' => 'index',
        ],
        '/:controller(/:action(/:id))' => [
            'controller' => 'Controller_:controller',
            'action' => 'index',
        ]
    ]
];