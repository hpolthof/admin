<?php namespace Hpolthof\Admin\Widget;

class Color extends Widget
{
    protected $red;
    protected $green;
    protected $blue;
    protected $alpha;

    /**
     * Color constructor.
     * @param $red
     * @param $green
     * @param $blue
     * @param $alpha
     */
    public function __construct($red = 0, $green = 0, $blue = 0, $alpha = 100)
    {
        $this->setRed($red)->setGreen($green)->setBlue($blue)->setAlpha($alpha);
    }

    public function __toString()
    {
        return $this->render();
    }

    public function render()
    {
        $alpha = $this->alpha / 100;
        return "rgba({$this->red}, {$this->green}, {$this->blue}, {$alpha})";
    }

    protected function validateColor($color)
    {
        $color = intval($color);
        if($color < 0) $color = 0;
        if($color > 255) $color = 255;
        return $color;
    }

    /**
     * @return mixed
     */
    public function getRed()
    {
        return $this->red;
    }

    /**
     * @param mixed $red
     * @return Color
     */
    public function setRed($red)
    {
        $this->red = $this->validateColor($red);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGreen()
    {
        return $this->green;
    }

    /**
     * @param mixed $green
     * @return Color
     */
    public function setGreen($green)
    {
        $this->green = $this->validateColor($green);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBlue()
    {
        return $this->blue;
    }

    /**
     * @param mixed $blue
     * @return Color
     */
    public function setBlue($blue)
    {
        $this->blue = $this->validateColor($blue);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAlpha()
    {
        return $this->alpha;
    }

    /**
     * @param mixed $alpha
     * @return Color
     */
    public function setAlpha($alpha)
    {
        $this->alpha = $alpha;
        return $this;
    }

    public function getColorMinusAlpha($alpha)
    {
        return new Color($this->getRed(), $this->getGreen(), $this->getBlue(), $this->getAlpha()-$alpha);
    }
}