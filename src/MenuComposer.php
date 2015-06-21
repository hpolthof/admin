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
                $this->getRenderedResult($i, $rendered);
            }
        } else {
            $this->getRenderedResult($menu, $rendered);
        }
        return $rendered;
    }

    /**
     * @param $i
     * @param $rendered
     * @return string
     */
    protected function getRenderedResult($i, &$rendered)
    {
        if (method_exists($i, 'render')) {
            $rendered .= $i->render();
        } else {
            $rendered .= $i;
        }
    }
}