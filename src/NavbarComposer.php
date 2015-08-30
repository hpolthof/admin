<?php namespace Hpolthof\Admin;

use Illuminate\Contracts\View\View;

class NavbarComposer extends MenuComposer
{
    public function compose(View $view)
    {
        $view->with('_navbar', $this->getMenu());
    }

    protected function getMenu()
    {
        $menu = require app_path('Admin/navbar.php');
        $rendered = "";
        return $this->distinctArrayOrWidget($menu, $rendered);
    }
}