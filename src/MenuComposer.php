<?php namespace Hpolthof\Admin;

use Illuminate\Contracts\View\View;

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
        return $this->distinctArrayOrWidget($menu, $rendered);
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

    /**
     * @param $menu
     * @param $rendered
     * @return mixed
     */
    protected function distinctArrayOrWidget($menu, $rendered)
    {
        if (is_array($menu)) {
            foreach ($menu as $i) {
                $this->getRenderedResult($i, $rendered);
            }
        } else {
            $this->getRenderedResult($menu, $rendered);
        }
        return $rendered;
    }
}