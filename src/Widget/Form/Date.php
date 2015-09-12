<?php namespace Hpolthof\Admin\Widget\Form;

class Date extends Field
{
    protected $height = '200px';
    protected $format = 'yyyy-mm-dd';

    public function renderField($id)
    {
        return view('admin::widget.form.date', [
            'id' => $id,
            'field' => $this,
            'type' => 'text',
        ]);
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param string $height
     * @return Date
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return Date
     */
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }



}