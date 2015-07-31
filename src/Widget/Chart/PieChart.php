<?php namespace Hpolthof\Admin\Widget\Chart;

use Hpolthof\Admin\Widget\Boxable;
use Hpolthof\Admin\Widget\Color;
use Hpolthof\Admin\Widget\Widget;
use Illuminate\Support\Collection;

class PieChart extends Widget implements ChartInterface
{
    use Boxable;

    protected $data;
    protected $height = 250;
    protected $width = null;
    protected $tooltips = true;
    protected $innercut = 0;
    protected $stroke = true;

    public function __construct()
    {
        $this->data = new Collection();
    }

    public static function getScriptPath()
    {
        return '/hpolthof/admin/plugins/chartjs/Chart.min.js';
    }

    public function addValue($label, $value, Color $color)
    {
        $this->data->push([
            'label' => $label,
            'value' => floatval($value),
            'color' => (string)$color,
            'highlight' => (string)$color->getColorMinusAlpha(30),
        ]);
    }

    public function render()
    {
        $uid = uniqid();
        $data = json_encode($this->data->all());
        $height = $this->height;
        $width = $this->width;

        $pie = $this;

        return view('admin::widget.chart.piechart', compact('uid', 'data', 'height', 'width', 'pie'))->render();
    }

    /**
     * @param int $height
     * @return PieChart
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param null $width
     * @return PieChart
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param boolean $tooltips
     * @return PieChart
     */
    public function setTooltips($tooltips)
    {
        $this->tooltips = $tooltips;
        return $this;
    }

    /**
     * @param int $innercut
     * @return PieChart
     */
    public function setInnercut($innercut)
    {
        $this->innercut = $innercut;
        return $this;
    }

    /**
     * @param boolean $stroke
     * @return PieChart
     */
    public function setStroke($stroke)
    {
        $this->stroke = $stroke;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return null
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return boolean
     */
    public function isTooltips()
    {
        return $this->tooltips;
    }

    /**
     * @return int
     */
    public function getInnercut()
    {
        return $this->innercut;
    }

    /**
     * @return boolean
     */
    public function isStroke()
    {
        return $this->stroke;
    }


}