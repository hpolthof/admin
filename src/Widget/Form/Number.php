<?php namespace Hpolthof\Admin\Widget\Form;


class Number extends Field
{
    public function renderField($id)
    {
        return view('admin::widget.form.text', [
            'id' => $id,
            'field' => $this,
            'type' => 'number',
        ]);
    }

}