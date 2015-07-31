<?php namespace Hpolthof\Admin\Widget\Chart;

use Hpolthof\Admin\Widget\Color;
use Hpolthof\Admin\LinechartDataset;

class AreaChart extends LineChart
{
    public function addAreaData($label, $values, Color $color)
    {
        $dataset = new LinechartDataset($label, $values);
        $dataset->setStrokeColor($color->getColorMinusAlpha(10));
        $dataset->setFillColor($color->getColorMinusAlpha(20));
        $dataset->setPointColor($color);
        $dataset->setPointStrokeColor('#fff');
        $dataset->setPointHighlightFill('#fff');
        $dataset->setPointHighlightStroke($color);
        return $this->addDataset($dataset);
    }
}