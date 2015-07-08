<?php namespace Hpolthof\Admin\Widget\Chart;

use Hpolthof\Admin\LinechartDataset;

class LineChart extends AbstractChart
{
    protected $height = '250';

    public function addLineData($label, $values, $color)
    {
        $dataset = new LinechartDataset($label, $values);
        $dataset->setStrokeColor($color);
        $dataset->setFillColor('rgba(255,255,255,0)');
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
        return view('admin::widget.chart.linechart', compact('uid', 'data', 'height'));
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