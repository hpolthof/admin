<?php namespace Hpolthof\Admin\Widget\Form;


class Html extends Field
{
    public function renderField($id)
    {
        return view('admin::widget.form.html', [
            'id' => $id,
            'field' => $this,
        ]);
    }

    public function getValue()
    {
        return $this->value;
    }


}