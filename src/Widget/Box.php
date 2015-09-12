<?php namespace Hpolthof\Admin\Widget;


class Box extends Widget
{
    public $title;
    public $header;
    public $footer;
    public $body;
    public $tools;
    public $class;

    protected $collapsible = false;
    protected $collapsed = true;

    protected $removable = false;

    protected $maxHeight = null;


    /**
     * @param mixed $tools
     * @return Box
     */
    public function setTools($tools)
    {
        $this->tools = $tools;
        return $this;
    }

    /**
     * @param mixed $title
     * @return Box
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param mixed $header
     * @return Box
     */
    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @param mixed $footer
     * @return Box
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @param mixed $body
     * @return Box
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function render()
    {
        return view('admin::widget.box', ['box' => $this]);
    }

    /**
     * You can set colours to the top of the box using box-primary, box-success, etc.
     * @param mixed $class
     * @return Box
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCollapsible()
    {
        return $this->collapsible;
    }

    /**
     * @param boolean $collapsible
     * @return Box
     */
    public function setCollapsible($collapsible)
    {
        $this->collapsible = $collapsible;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCollapsed()
    {
        return $this->collapsed;
    }

    /**
     * @param boolean $collapsed
     * @return Box
     */
    public function setCollapsed($collapsed)
    {
        $this->collapsed = $collapsed;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRemovable()
    {
        return $this->removable;
    }

    /**
     * @param boolean $removable
     * @return Box
     */
    public function setRemovable($removable)
    {
        $this->removable = $removable;
        return $this;
    }

    /**
     * @return null
     */
    public function getMaxHeight()
    {
        return $this->maxHeight;
    }

    /**
     * @param null $maxHeight
     * @return Box
     */
    public function setMaxHeight($maxHeight)
    {
        $this->maxHeight = $maxHeight;
        return $this;
    }





}