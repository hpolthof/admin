<?php namespace Hpolthof\Admin\Widget\Table;

use Hpolthof\Admin\Widget\Widget;
use Illuminate\Support\Facades\Blade;

class Column extends Widget
{
    public $field;
    public $title;
    public $type = 'string';
    public $content = null;
    public $sortable = true;
    protected $data = [];

    public function render()
    {
        // Use direct rendering from string instead of a view.
        // This saves on performance when using large tables.
        return "<th>".e($this->title)."</th>";
//        return view('admin::widget.table.column_header', [
//            'title' => $this->title,
//        ]);
    }

    public function renderColumn($item, array $data = [])
    {
        // Use direct rendering from string instead of a view.
        // This saves on performance when using large tables.
        $content = $this->getColumnContent($item);
        if(!$this->isRaw()) {
            $content = e($content);
        }
        return "<td>{$content}</td>";
//        $column = view('admin::widget.table.column', [
//            'column' => $this,
//            'item' => $item,
//            'data' => $data,
//        ]);
//        return $column->render();
    }

    /**
     * @param mixed $field
     * @return Column
     */
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @param mixed $title
     * @return Column
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $type
     * @return Column
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $content
     * @return Column
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param boolean $sortable
     * @return Column
     */
    public function setSortable($sortable)
    {
        $this->sortable = $sortable;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return boolean
     */
    public function isSortable()
    {
        return $this->sortable;
    }

    public function getColumnContent($item, array $data = [])
    {
        $content = $this->content;
        if ($content === null) {
            $content = $item->{$this->field};
        }


        if($this->getType() == 'view') {
            $content = \View::make($this->getContent(), [
                'column' => $this,
                'item' => $item,
            ])->render();
        }

        return $content;
    }

    public function getData($name)
    {
        return $this->data[$name];
    }

    public function addData($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function isRaw()
    {
        $raw = ['view', 'image'];
        if(array_search($this->getType(), $raw) !== FALSE) {
            return true;
        }
        return false;
    }

}