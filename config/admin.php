<?php

return [
    'title' => 'AdminTemplate',

    'footer' => [
        'left' => '<strong>Copyright &copy; '.date('Y').' <a href="#">AdminServiceProvider</a>.</strong> All rights reserved.',
        'right' => 'Anything you want',
    ],

    'logo' => [
        'large' => '<b>Admin</b>istration',
        'small' => '<b>A</b>dmin',
        'link' => '#',
    ],


    'layout' => [

        // Skins are: blue, black, purple, yellow, red, green
        'skin' => 'red',
        // Options are: fixed, layout-boxed, layout-top-nav, sidebar-collapse, sidebar-mini
        // These can be combined
        'options' => 'sidebar-mini',
    ],

    'includes' => [
        'css' => [],
        'js' => [],
    ],

    'search' => [
        'url' => '',
        'method' => 'POST',
        'parameter' => 'query',
        'placeholder' => 'Search...',
    ]

];