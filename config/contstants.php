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

    'tailwind' => [
        'input_d' => 'form-input rounded-md shadow-sm mt-1 block w-full',
        'select_d' => 'form-select rounded-md shadow-sm mt-1 block w-full',

        'red_button' =>'inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-red disabled:opacity-25 transition ease-in-out duration-150',
        'blue_button' =>'inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-blue disabled:opacity-25 transition ease-in-out duration-150',
        'green_button' =>'inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:shadow-outline-green disabled:opacity-25 transition ease-in-out duration-150',

        'red_button_o' =>'inline-flex items-center px-4 py-2 border border-red-600 rounded-md font-semibold text-xs text-red-600 uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-red focus:text-white hover:text-white disabled:opacity-25 transition ease-in-out duration-150',
        'blue_button_o' =>'inline-flex items-center px-4 py-2 border border-blue-600 rounded-md font-semibold text-xs text-blue-600 uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-blue focus:text-white hover:text-white disabled:opacity-25 transition ease-in-out duration-150',
        'green_button_o' =>'inline-flex items-center px-4 py-2 border border-green-600 rounded-md font-semibold text-xs text-green-600 uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:shadow-outline-green focus:text-white hover:text-white disabled:opacity-25 transition ease-in-out duration-150',

        'red_button_od' =>'inline-flex items-center px-4 py-2 border border-red-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-red focus:text-white hover:text-white disabled:opacity-25 transition ease-in-out duration-150',
        'blue_button_od' =>'inline-flex items-center px-4 py-2 border border-blue-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-blue focus:text-white hover:text-white disabled:opacity-25 transition ease-in-out duration-150',
        'green_button_od' =>'inline-flex items-center px-4 py-2 border border-green-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:shadow-outline-green focus:text-white hover:text-white disabled:opacity-25 transition ease-in-out duration-150',
    ],

];
