<?php namespace Hpolthof\Admin\Widget\Chart;

use Hpolthof\Admin\Dataset;
use Hpolthof\Admin\Widget\Widget;

abstract class AbstractChart extends Widget implements ChartInterface
{
    protected $labels = array();
    protected $datasets = array();

    public function addDataset(Dataset $dataset)
    {
        $this->datasets[] = $dataset;
        return $this;
    }

    public function getDatasets()
    {
        return $this->datasets;
    }

    /**
     * @return array
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     * @return AbstractChart
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
        return $this;
    }

    public function addLabel($label)
    {
        $this->labels[] = $label;
        return $this;
    }

    protected function getDataArray()
    {
        $datasets = array();
        foreach($this->datasets as $ds) {
            $datasets[] = $ds->toArray();
        }

        return array(
            'labels' => $this->labels,
            'datasets' => $datasets,
        );
    }
}