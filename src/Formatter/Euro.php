<?php namespace Hpolthof\Admin\Formatter;

use Hpolthof\Admin\AdminFormatter;

class Euro implements AdminFormatter
{
    public function format($value)
    {
        return '&euro; '.number_format($value, 2, ',', '.');
    }
}