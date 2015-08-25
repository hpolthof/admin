<?php namespace Hpolthof\Admin\Widget\Form;


class Select extends Field
{
    protected $options;
    protected $emptyStart = false;

    public function renderField($id)
    {
        return view('admin::widget.form.select', [
            'id' => $id,
            'field' => $this,
        ]);
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     * @return Select
     */
    public function setOptions(array $options = [])
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEmptyStart()
    {
        return $this->emptyStart;
    }

    /**
     * @param boolean $emptyStart
     * @return Select
     */
    public function setEmptyStart($emptyStart = true)
    {
        $this->emptyStart = $emptyStart;
        return $this;
    }


}