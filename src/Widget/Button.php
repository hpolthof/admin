<?php namespace Hpolthof\Admin\Widget;

class Button extends Widget
{
    protected $icon = null;
    protected $text = '';
    protected $action = null;
    protected $class = 'btn-default';
    protected $data = [];
    protected $url = null;
    protected $target = null;

    public function render()
    {
        $icon = '';
        if ($this->icon != null) {
            $icon = "<i class='fa {$this->icon}'></i>";
        }

        $url = '#';
        if ($this->action != null) {
            $url = \URL::action($this->action, $this->data);
        }

        if($this->url != null) {
            $url = $this->url;
        }

        return "<a target='{$this->target}' class='btn {$this->class}' href='{$url}'>{$icon}{$this->text}</a>";
    }

    /**
     * @param null $icon
     * @return Button
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @param string $text
     * @return Button
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param string $action
     * @return Button
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @param string $class
     * @return Button
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @param array $data
     */
    public function setData(array $data = [])
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param null $url
     * @return Button
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param null $target
     * @return Button
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }


}