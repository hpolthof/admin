<?php namespace Hpolthof\Admin;

use Hpolthof\Admin\Widget\Breadcrumbs;
use Hpolthof\Admin\Widget\Link;
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
    protected $subtitle;
    protected $breadcrumbs;

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
        $this->loadCrudSubtitle();

        $that = $this;
        \View::composer('admin::layout.base', function(View $view) use ($that) {
            $view->with('title', $that->title);
            $view->with('subtitle', $that->subtitle);
            $view->with('controller', $that);
        });
        view()->composer(
            'admin::layout.base', 'Hpolthof\Admin\MenuComposer'
        );
    }

    protected function loadCrudSubtitle()
    {
        list($controller, $action) = explode('@', \Request::route()->getAction()['uses']);
        if($this->subtitle === null) {
            if(array_search($action, ['create', 'edit', 'index']) !== FALSE) {
                $this->subtitle = trans('crud.'.$action);
            }
        }
    }

    public static function menuCrud($title, $icon = '', $extra_items = [])
    {
        $menu = new Menu($title, $icon);
        $menu->addItem(new Item(trans('crud.index'), \URL::action('\\'.get_called_class().'@index'), 'fa-list-alt'));
        $menu->addItem(new Item(trans('crud.create'), \URL::action('\\'.get_called_class().'@create'), 'fa-pencil'));
        foreach($extra_items as $i) {
            $menu->addUnsafe($i);
        }

        return $menu;
    }

    public function getBreadcrumbs()
    {
        if(!isset($this->breadcrumbs)) {
            $this->breadcrumbs = new Breadcrumbs();
        }
        return $this->breadcrumbs;
    }

    public function setBreadcrumbs(Breadcrumbs $breadcrumbs)
    {
        $this->breadcrumbs = $breadcrumbs;
        return $this;
    }

    public function addBreadcrumb(Link $link)
    {
        $this->getBreadcrumbs()->addLink($link);
        return $this;
    }

    public function addActionCrumb($action, $label, $icon = null)
    {
        $this->addBreadcrumb(self::actionLink($action, $label, $icon));
    }

    public function hasBreadcrumbs()
    {
        return $this->getBreadcrumbs()->count() > 0;
    }

    public static function actionLink($action, $label, $icon = null)
    {
        $class = get_called_class();
        return new Link(\URL::action("\\{$class}@{$action}"), $label, $icon);
    }
}