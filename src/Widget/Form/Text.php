<?php namespace Hpolthof\Admin\Widget\Form;

class Text extends Field
{
    public function renderField($id)
    {
        return view('admin::widget.form.text', [
            'id' => $id,
            'field' => $this,
            'type' => 'text',
        ]);
    }

}