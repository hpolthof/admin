<?php namespace Hpolthof\Admin;

use Hpolthof\Admin\Widget\Breadcrumbs;
use Hpolthof\Admin\Widget\Link;
use Hpolthof\Admin\Widget\Menu\Item;
use Hpolthof\Admin\Widget\Menu\Menu;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Collection;
use Illuminate\View\View;

abstract class AdminController extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    protected $title = 'Set $title';
    protected $subtitle;
    protected $breadcrumbs;
    protected $css;
    protected $js;

    protected function view($view = null, $data = array(), $mergeData = array())
    {
        if(array_search('Barryvdh\Debugbar\LaravelDebugbar', get_declared_classes()) !== FALSE) {
            \Debugbar::startMeasure('admin_view', 'Admin view generation');
        }
        $this->loadBaseComposer();
        $content = view($view, array_merge($data, ['_ctrl' => $this]), $mergeData)->render();
        $content = view('admin::layout.base', ['content' => $content, '_ctrl' => $this]);
        if(array_search('Barryvdh\Debugbar\LaravelDebugbar', get_declared_classes()) !== FALSE) {
            \Debugbar::stopMeasure('admin_view');
        }

        return $content;
    }

    protected function loadBaseComposer()
    {
        $this->loadCrudSubtitle();

        $that = $this;

        // Menu
        \View::composer('admin::layout.base', function(View $view) use ($that) {
            $view->with('title', $that->title);
            $view->with('subtitle', $that->subtitle);
            $view->with('controller', $that);
        });
        view()->composer(
            'admin::layout.base', 'Hpolthof\Admin\MenuComposer'
        );

        // Navbar
        \View::composer('admin::layout.partials.navbar.navbar', function(View $view) use ($that) {
            $view->with('controller', $that);
        });
        view()->composer(
            'admin::layout.partials.navbar.navbar', 'Hpolthof\Admin\NavbarComposer'
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

    public static function menuCrud($title, $icon = '', $extra_items = [], $indicator = null)
    {
        $menu = new Menu($title, $icon, null, $indicator);
        $menu->addItem(new Item(trans('crud.index'), \URL::action('\\'.get_called_class().'@index'), 'fa-list-alt'));
        if(method_exists('\\'.get_called_class(), 'create')) $menu->addItem(new Item(trans('crud.create'), \URL::action('\\'.get_called_class().'@create'), 'fa-pencil'));
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

    public function addActionCrumb($action, $label, $icon = null, array $parameters = [])
    {
        $this->addBreadcrumb(self::actionLink($action, $label, $icon, $parameters));
    }

    public function hasBreadcrumbs()
    {
        return $this->getBreadcrumbs()->count() > 0;
    }

    public static function actionLink($action, $label, $icon = null, array $parameters = [])
    {
        $class = get_called_class();
        return new Link(\URL::action("\\{$class}@{$action}", $parameters), $label, $icon);
    }

    public function getJs()
    {
        if ($this->js == null) {
            $this->js = new Collection();
        }
        return $this->js;
    }

    public function getCss()
    {
        if ($this->css == null) {
            $this->css = new Collection();
        }
        return $this->css;
    }

    public function addJs($script)
    {
        $this->getJs()->push($script);
        return $this;
    }

    public function addCss($script)
    {
        $this->getCss()->push($script);
        return $this;
    }

    protected function addMessage($type, $message)
    {
        $messages = array();
        if(\Session::has('adminMessages')) {
            $messages = \Session::get('adminMessages');
        }
        $messages[$type][] = $message;
        \Session::flash('adminMessages', $messages);
        return $this;
    }

    public function addError($message)
    {
        return $this->addMessage('danger', $message);
    }

    public function addSuccess($message)
    {
        return $this->addMessage('success', $message);
    }

    public function addInfo($message)
    {
        return $this->addMessage('info', $message);
    }

    public function addWarning($message)
    {
        return $this->addMessage('warning', $message);
    }

    protected function addActionMessage($action, $type = 'success', $translate_group = 'messages')
    {
        $controller = snake_case(class_basename($this));
        return $this->addMessage($type, trans($translate_group.'.'.$controller.'.'.strtolower($action)));
    }
}