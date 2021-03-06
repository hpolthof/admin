<?php namespace Hpolthof\Admin\Widget\Table;

use Hpolthof\Admin\AdminFormatter;
use Hpolthof\Admin\Widget\Widget;
use Illuminate\Support\Facades\Blade;

class Column extends Widget
{
    public $field;
    public $title;
    public $type = 'string';
    public $content = null;
    public $sortable = true;
    public $width;

    protected $raw = false;
    protected $data = [];
    protected $escapeHeader = true;
    protected $formatter;

    /**
     * @param array|AdminFormatter $formatter
     * @return Column
     */
    public function setFormatter($formatter)
    {
        $this->formatter = $formatter;
        return $this;
    }


    public function render()
    {
        // Use direct rendering from string instead of a view.
        // This saves on performance when using large tables.
        $title = $this->title;
        if($this->escapeHeader) {
            $title = e($title);
        }

        $style = '';
        if(isset($this->width)) {
            $style = " style='width:{$this->width}'";
        }

        return "<th{$style}>{$title}</th>";
//        return view('admin::widget.table.column_header', [
//            'title' => $this->title,
//        ]);
    }

    public function renderColumn($item, array $data = [])
    {
        // Use direct rendering from string instead of a view.
        // This saves on performance when using large tables.
        $content = $this->getFinalContent($item);

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
        if ($content === null && $this->getType() != 'method') {
            $content = $item->{$this->field};
        }

        if($this->getType() == 'euro') {
            $content = '&euro; '.number_format($content, 2, ',', '.');
        }

        if($this->getType() == 'method') {
            $content = call_user_func([$item, $this->field]);
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
        $raw = ['view', 'image', 'raw'];
        if(array_search($this->getType(), $raw) !== FALSE) {
            return true;
        }
        return $this->raw;
    }

    public function setRaw($value = true)
    {
        $this->raw = $value;
        return $this;
    }


    public function setEscapeHeader($escapeHeader = true)
    {
        $this->escapeHeader = $escapeHeader;
        return $this;
    }

    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param $content
     * @return mixed
     */
    protected function applyFormatter($content)
    {
        if ($this->formatter !== null) {
            if (is_array($this->formatter)) {
                foreach ($this->formatter as $f) {
                    $content = call_user_func([$f, 'format'], $content);
                }
                return $content;
            } else {
                $content = call_user_func([$this->formatter, 'format'], $content);
                return $content;
            }
        }
        return $content;
    }

    /**
     * @param $item
     * @return mixed|null|string
     */
    public function getFinalContent($item)
    {
        $content = $this->getColumnContent($item);
        if (!$this->isRaw()) {
            $content = e($content);
        }

        $content = $this->applyFormatter($content);
        return $content;
    }

}