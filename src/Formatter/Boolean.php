<?php namespace Hpolthof\Admin\Formatter;

use Hpolthof\Admin\AdminFormatter;

class Boolean implements AdminFormatter
{
    public function format($value)
    {
        if($value) {
            $icon = 'fa-check';
        } else {
            $icon = 'fa-times';
        }

        return "<i class='fa {$icon}'></i>";
    }

}