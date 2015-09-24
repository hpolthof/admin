<?php namespace Hpolthof\Admin\Widget\Table;

use Hpolthof\Admin\AdminException;
use Hpolthof\Admin\AdminPaginatorPresenter;
use Hpolthof\Admin\Condition;
use Hpolthof\Admin\Widget\Button;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class CrudTable extends Table
{
    protected $controller;
    protected $exclude;
    protected $paginate = 0;
    protected $_uid;
    protected $extra_actions;
    protected $buttons;
    protected $group_by_field_name;
    protected $link_parameters = [];

    public function __construct($checkboxes = true)
    {
        parent::__construct();

        $this->exclude = new Collection();
        $this->extra_actions = new Collection();
        $this->buttons = new Collection();
        $this->_uid = uniqid();

        if($checkboxes) $this->addCheckboxes();
    }

    /**
     * @param mixed $controller
     * @return CrudTable
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    public function render()
    {
        if(!class_exists($this->controller)) {
            throw new AdminException('No controller was set or defined.');
        }

        $this->executeQuery();

        if($this->paginate > 0) {
            $this->setTools(new AdminPaginatorPresenter($this->items));
        }

        if($this->extra_actions->count() > 0 || !$this->exclude->contains('show') || !$this->exclude->contains('edit') || !$this->exclude->contains('destroy')) {
            $column = new Column();
            $column
                ->setTitle(trans('crud.actions'))
                ->setWidth($this->extra_actions->count()>0?'200px':'130px')
                ->setSortable(false)
                ->setType('view')
                ->setContent('admin::widget.table.crud.actions')
                ->addData('controller', $this->controller)
                ->addData('table', $this)
                ->addData('exclude', $this->exclude)
                ->addData('extra', $this->extra_actions);

            $this->addColumn($column);
        }

        // Is footer overridden?
        if(strlen($this->footer) == 0) {
            $this->setFooter(view('admin::widget.table.crud.footer', ['controller' => $this->controller, 'exclude' => $this->exclude, 'link_parameters' => $this->getLinkParameters()])->render());
        }

        return parent::render();
    }

    public function addExclude($exclude)
    {
        if(is_array($exclude)) {
            array_map([$this, 'addExclude'], $exclude);
        } else {
            $this->exclude->push($exclude);
        }

        return $this;
    }

    public function resetExclude()
    {
        $this->exclude = new Collection();
        return $this;
    }

    public function paginate($paginate)
    {
        $this->paginate = intval($paginate);
        return $this;
    }

    protected function executeQuery()
    {
        if ($this->items instanceof Builder) {
            if($this->getGroupBy() !== null) {
                $group_field = $this->getGroupByFieldName() === null ? $this->getGroupBy() : $this->getGroupByFieldName();
                // Insert as first order in sequence
                $this->items->getQuery()->orders = array_merge(array(array(
                    'column' => $group_field,
                    'direction' => 'asc',
                )), $this->items->getQuery()->orders===null?array():$this->items->getQuery()->orders);
            }

            if ($this->paginate > 0) {
                $this->items = $this->items->paginate($this->paginate);
            } else {
                $this->items->get();
            }
        }
    }

    protected function addCheckboxes()
    {
        $column = new Column();
        $column
            ->setTitle(view('admin::widget.table.crud.checkboxhead', ['uid' => $this->_uid]))
            ->setWidth('26px')
            ->setEscapeHeader(false)
            ->setSortable(false)
            ->setType('view')
            ->setContent('admin::widget.table.crud.checkbox')
            ->addData('uid', $this->_uid);
        $this->addColumn($column);
    }

    public function addExtraActions($view)
    {
        $this->extra_actions->push($view);
        return $this;
    }

    public function addButton(Button $button, Condition $condition = null)
    {
        $this->buttons->push(compact('button', 'condition'));
        return $this;
    }

    public function getButtons()
    {
        return $this->buttons;
    }

    public function getGroupByFieldName()
    {
        return $this->group_by_field_name;
    }

    public function setGroupByFieldName($group_by_field_name)
    {
        $this->group_by_field_name = $group_by_field_name;
        return $this;
    }

    public function getLinkParameters()
    {
        return $this->link_parameters;
    }

    public function setLinkParameter($name, $value)
    {
        $this->link_parameters[$name] = $value;
        return $this;
    }

}