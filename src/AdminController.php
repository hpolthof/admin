<?php namespace Hpolthof\Admin;

use Hpolthof\Admin\Widget\Menu\Item;
use Hpolthof\Admin\Widget\Menu\Menu;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\View\View;

abstract class AdminController extends BaseController
{
    use DispatchesCommands, ValidatesRequests;

    protected $title = 'Set $title';
    protected $subtitle = 'Set $subtitle';

    protected function view($view = null, $data = array(), $mergeData = array())
    {
        if(array_search('Barryvdh\Debugbar\LaravelDebugbar', get_declared_classes()) !== FALSE) {
            \Debugbar::startMeasure('admin_view', 'Admin view generation');
        }
        $this->loadBaseComposer();
        $content = view($view, $data, $mergeData)->render();
        $content = view('admin::layout.base', compact('content'));
        if(array_search('Barryvdh\Debugbar\LaravelDebugbar', get_declared_classes()) !== FALSE) {
            \Debugbar::stopMeasure('admin_view');
        }

        return $content;
    }

    protected function loadBaseComposer()
    {
        $that = $this;
        \View::composer('admin::layout.base', function(View $view) use ($that) {
            $view->with('title', $that->title);
            $view->with('subtitle', $that->subtitle);
        });
        view()->composer(
            'admin::layout.base', 'Hpolthof\Admin\MenuComposer'
        );
    }

    public static function menuCrud($title, $icon = '', $extra_items = [])
    {
        $menu = new Menu($title, $icon);
        $menu->addItem(new Item(trans('crud.index'), \URL::action('\\'.get_called_class().'@index'), 'fa-circle-o'));
        $menu->addItem(new Item(trans('crud.create'), \URL::action('\\'.get_called_class().'@create'), 'fa-circle-o'));
        foreach($extra_items as $i) {
            $menu->addUnsafe($i);
        }

        return $menu;
    }
}