<?php namespace Hpolthof\Admin\Formatter;

use Hpolthof\Admin\AdminFormatter;

class Date implements AdminFormatter
{
    protected $format;

    public function __construct($format = 'd-m-Y')
    {
        $this->format = $format;
    }

    public function format($value)
    {
        if($value === null or $value === '' or $value == '00-00-0000 00:00:00' or $value == '-0001-11-30 00:00:00')
            return '-';

        return date_create($value)->format($this->format);
    }
}