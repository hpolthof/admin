<?php namespace Hpolthof\Admin\Widget\Form;

class Boolean extends Select
{
    function __construct()
    {
        $this->setOptions([
            true => trans('admin.boolean.true'),
            false => trans('admin.boolean.false'),
        ]);
    }
}