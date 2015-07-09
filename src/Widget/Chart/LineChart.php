<?php namespace Hpolthof\Admin\Widget\Chart;

use Hpolthof\Admin\LinechartDataset;
use Hpolthof\Admin\Widget\Boxable;
use Hpolthof\Admin\Widget\Color;
use Hpolthof\Admin\Widget\Color\TransparantColor;

class LineChart extends AbstractChart
{
    use Boxable;

    protected $height = '250';

    public function addLineData($label, $values, Color $color)
    {
        $dataset = new LinechartDataset($label, $values);
        $dataset->setStrokeColor($color);
        $dataset->setFillColor(new TransparantColor);
        $dataset->setPointColor($color);
        $dataset->setPointStrokeColor('#fff');
        $dataset->setPointHighlightFill('#fff');
        $dataset->setPointHighlightStroke($color);
        return $this->addDataset($dataset);
    }

    public function render()
    {
        $uid = uniqid();
        $data = json_encode($this->getDataArray());
        $height = $this->height;
        $legend = $this->getLegendArray();

        return view('admin::widget.chart.linechart', compact('uid', 'data', 'height', 'legend'))->render();
    }

    protected function getLegendArray()
    {
        $legend = array();

        foreach($this->datasets as $dataset) {
            $legend[] = array($dataset->getLabel(), $dataset->getStrokeColor());
        }
        return $legend;
    }

    public static function getScriptPath()
    {
        return '/hpolthof/admin/plugins/chartjs/Chart.min.js';
    }

    /**
     * @param string $height
     * @return LineChart
     */
    public function setHeight($height)
    {
        $this->height = intval($height);
        return $this;
    }


}