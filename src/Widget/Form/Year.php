<?php namespace Hpolthof\Admin\Widget\Form;

class Year extends Select
{
    protected $min;
    protected $max;

    public function __construct()
    {
        $this->min = intval(date('Y')) - 10;
        $this->max = intval(date('Y')) + 10;
    }

    public function render()
    {
        $options = [];
        foreach(range($this->min, $this->max) as $year) {
            $options[$year] = $year;
        }

        $this->setOptions($options);

        return parent::render();
    }

    /**
     * @return mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param mixed $min
     * @return Year
     */
    public function setMin($min)
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param mixed $max
     * @return Year
     */
    public function setMax($max)
    {
        $this->max = $max;
        return $this;
    }
}