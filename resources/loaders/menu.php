<?php
use Hpolthof\Admin\Widget\Menu\Item;
use Hpolthof\Admin\Widget\Menu\Menu;

return [
    new Item('Home', '/', 'fa-home'),
    (new Menu('Test', 'fa-users'))
        ->addItem(new Item('Google', 'http://www.google.com', 'fa-times'))
        ->addItem(new Item('Bing', 'http://www.bing.com', 'fa-times'))
        ->addMenu((new Menu('Nederlands', 'fa-flag'))
                ->addItem(new Item('Google', 'http://www.google.nl', 'fa-times'))
                ->addItem(new Item('Bing', 'http://www.bing.nl', 'fa-times'))
        )
];