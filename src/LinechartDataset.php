<?php namespace Hpolthof\Admin;

class LinechartDataset extends Dataset
{
    protected $fillColor;
    protected $strokeColor;
    protected $pointColor;
    protected $pointStrokeColor;
    protected $pointHighlightFill;
    protected $pointHighlightStroke;

    /**
     * @param mixed $fillColor
     * @return LinechartDataset
     */
    public function setFillColor($fillColor)
    {
        $this->fillColor = (string)$fillColor;
        return $this;
    }

    /**
     * @param mixed $strokeColor
     * @return LinechartDataset
     */
    public function setStrokeColor($strokeColor)
    {
        $this->strokeColor = (string)$strokeColor;
        return $this;
    }

    /**
     * @param mixed $pointColor
     * @return LinechartDataset
     */
    public function setPointColor($pointColor)
    {
        $this->pointColor = (string)$pointColor;
        return $this;
    }

    /**
     * @param mixed $pointStrokeColor
     * @return LinechartDataset
     */
    public function setPointStrokeColor($pointStrokeColor)
    {
        $this->pointStrokeColor = (string)$pointStrokeColor;
        return $this;
    }

    /**
     * @param mixed $pointHighlightFill
     * @return LinechartDataset
     */
    public function setPointHighlightFill($pointHighlightFill)
    {
        $this->pointHighlightFill = (string)$pointHighlightFill;
        return $this;
    }

    /**
     * @param mixed $pointHighlightStroke
     * @return LinechartDataset
     */
    public function setPointHighlightStroke($pointHighlightStroke)
    {
        $this->pointHighlightStroke = (string)$pointHighlightStroke;
        return $this;
    }

    public function toArray()
    {
        return $this->generateArray(['label', 'fillColor', 'strokeColor', 'pointColor', 'pointStrokeColor', 'pointHighlightFill', 'pointHighlightStroke']);
    }

    /**
     * @return mixed
     */
    public function getStrokeColor()
    {
        return $this->strokeColor;
    }


}