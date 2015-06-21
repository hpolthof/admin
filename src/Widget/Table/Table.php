<?php namespace Hpolthof\Admin\Widget\Table;


use Hpolthof\Admin\Widget\Box;
use Hpolthof\Admin\Widget\Widget;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class Table extends Widget
{
    public $columns;
    public $items;
    public $title;
    public $header;
    public $tools;
    public $footer;

    public function __construct()
    {
        $this->columns = new Collection();
    }

    public function render()
    {
        $table = view('admin::widget.table.table', ['table' => $this]);

        if(isset($this->title)) {
            $box = Box::create()
                ->setTitle(self::stringOrRender($this->title))
                ->setBody(self::stringOrRender($table))
                ->setHeader(self::stringOrRender($this->header))
                ->setTools(self::stringOrRender($this->tools));
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

    public function setPullHeaderRight($pullHeaderRight = true)
    {
        $this->pullHeaderRight = $pullHeaderRight;
        return $this;
    }

    public function setTools($tools)
    {
        $this->tools = $tools;
        return $this;
    }

    public function setFooter($footer)
    {
        $this->footer = $footer;
        return $this;
    }


}