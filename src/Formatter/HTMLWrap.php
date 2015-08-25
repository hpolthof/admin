<?php namespace Hpolthof\Admin\Formatter;

use Hpolthof\Admin\AdminFormatter;

abstract class HTMLWrap implements AdminFormatter
{
    protected $wrap = 'div';

    public function format($value)
    {
        return '<'.$this->wrap.'>'.$value.'</'.$this->wrap.'>';
    }

}