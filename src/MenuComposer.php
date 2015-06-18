<?php namespace Hpolthof\Admin;


use Hpolthof\Admin\Widget\Menu\Item;
use Illuminate\Contracts\View\View;
use Hpolthof\Admin\Widget\Menu\Menu;

class MenuComposer
{
    public function compose(View $view)
    {
        $view->with('menu', $this->getMenu());
    }

    protected function getMenu()
    {
        $menu = require app_path('Admin/menu.php');
        $rendered = "";

        if(is_array($menu)) {
            foreach($menu as $i) {
                $rendered .= $i->render();
            }
        } else {
            $rendered = $menu->render();
        }
        return $rendered;
    }
}