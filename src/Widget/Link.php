<?php namespace Hpolthof\Admin\Widget;

class Link extends Widget
{
    protected $url;
    protected $icon;
    protected $label;
    protected $target;

    function __construct($url = null, $label = null, $icon = null)
    {
        if ($url != null) {
            $this->setUrl($url);
        }
        if ($label != null) {
            $this->setLabel($label);
        }
        if ($icon != null) {
            $this->setIcon($icon);
        }
    }

    public function render()
    {
        $target = '';
        if($this->getTarget() !== null) {
            $target = "target='{$this->getTarget()}'";
        }

        $ret = "<a href='{$this->url}' {$target}>";
        if(isset($this->icon)) {
            $ret .= "<i class='fa {$this->icon}'></i>&nbsp;";
        }
        $ret .= $this->label."</a>";
        return $ret;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return Link
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     * @return Link
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     * @return Link
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param mixed $target
     * @return Link
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }


}