<?php namespace Hpolthof\Admin\Widget\Form;

class Textarea extends Field
{
    protected $rows = 5;

    public function renderField($id)
    {
        return view('admin::widget.form.textarea', [
            'id' => $id,
            'field' => $this,
        ]);
    }

    /**
     * @return int
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param int $rows
     * @return Textarea
     */
    public function setRows($rows)
    {
        $this->rows = $rows;
        return $this;
    }


}