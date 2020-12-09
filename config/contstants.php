<?php


return [
    'topbar_menus' => [
        [
            'name' => 'Dashboard',
            'route' => 'dashboard',
            'icon' => '<i class="fa fa-dashboard mr-1"></i>',
        ],
        [
            'name' => 'Configurations',
            'route' => 'configs',
            'icon' => '<i class="fa fa-cog mr-1"></i>',
        ],
        [
            'name' => 'Posts',
            'route' => 'posts',
            'icon' => '<i class="fa fa-paper-plane mr-1"></i>',
        ],
        [
            'name' => 'Categories',
            'route' => 'categories',
            'icon' => '<i class="fa fa-list-alt mr-1"></i>',
        ],
        [
            'name' => 'Dashboard',
            'route' => 'dashboard',
            'icon' => '',
            'submenu' => [
                [
                    'name' => 'Dashboard',
                    'route' => 'dashboard',
                    'icon' => '',
                ],
                [
                    'name' => 'Dashboard',
                    'route' => 'dashboard',
                    'icon' => '',
                ],
            ]
        ],
    ],


];
