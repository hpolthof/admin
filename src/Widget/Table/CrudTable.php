<?php namespace Hpolthof\Admin\Widget\Table;

use Hpolthof\Admin\AdminException;
use Hpolthof\Admin\AdminPaginatorPresenter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class CrudTable extends Table
{
    protected $controller;
    protected $exclude;
    protected $paginate = 0;
    protected $_uid;

    public function __construct()
    {
        parent::__construct();

        $this->exclude = new Collection();
        $this->_uid = uniqid();

        $this->addCheckboxes();
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

        $column = new Column();
        $column
            ->setTitle(trans('crud.actions'))
            ->setSortable(false)
            ->setType('view')
            ->setContent('admin::widget.table.crud.actions')
            ->addData('controller', $this->controller)
            ->addData('exclude', $this->exclude);

        $this->addColumn($column);

        $this->setFooter(view('admin::widget.table.crud.footer', ['controller' => $this->controller, 'exclude' => $this->exclude])->render());

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

    public function paginate($paginate)
    {
        $this->paginate = intval($paginate);
        return $this;
    }

    protected function executeQuery()
    {
        if ($this->items instanceof Builder) {
            if ($this->paginate > 0) {
                $this->items = $this->items->paginate($this->paginate);
            } else {
                $this->items = $this->items->get();
            }
        }
    }

    protected function addCheckboxes()
    {
        $column = new Column();
        $column
            ->setTitle(view('admin::widget.table.crud.checkboxhead', ['uid' => $this->_uid]))
            ->setEscapeHeader(false)
            ->setSortable(false)
            ->setType('view')
            ->setContent('admin::widget.table.crud.checkbox')
            ->addData('uid', $this->_uid);
        $this->addColumn($column);
    }


}