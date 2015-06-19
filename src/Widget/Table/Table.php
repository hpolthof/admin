<?php namespace Hpolthof\Admin\Widget\Table;


use Hpolthof\Admin\Widget\Box;
use Hpolthof\Admin\Widget\Widget;
use Illuminate\Support\Collection;

class Table extends Widget
{
    public $columns;
    public $items;
    public $title;
    public $header;

    public function __construct()
    {
        $this->columns = new Collection();
    }

    public function render()
    {
        $table = view('admin::widget.table.table', ['table' => $this]);
        $table = $table->render();

        if(isset($this->title)) {
            $box = Box::create()
                ->setTitle($this->title)
                ->setBody($table)
                ->setHeader(self::stringOrRender($this->header));
            $table = $box->render();
        }
        return $table;
    }

    public function addColumn(Column $column)
    {
        $this->columns->push($column);
        return $this;
    }

    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

}