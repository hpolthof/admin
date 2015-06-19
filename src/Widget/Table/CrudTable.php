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

    public function __construct()
    {
        $this->exclude = new Collection();
        parent::__construct();
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


}