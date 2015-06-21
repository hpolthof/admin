<?php namespace Hpolthof\Admin\Widget\Box;

use Hpolthof\Admin\Widget\Widget;

class Stats extends Widget
{
    protected $name;
    protected $url;
    protected $label;
    protected $value;
    protected $color;
    protected $icon;

    public function __construct()
    {
        // TODO: Implement __construct() method.
    }

    public function render()
    {
        return view('admin::widget.box.stats', [
            'name' => $this->name,
            'url' => $this->url,
            'label' => $this->label,
            'value' => $this->value,
            'color' => $this->color,
            'icon' => $this->icon,
        ]);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Stats
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
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
     * @return Stats
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
     * @return Stats
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return Stats
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     * @return Stats
     */
    public function setColor($color)
    {
        $this->color = $color;
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
     * @return Stats
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }



}