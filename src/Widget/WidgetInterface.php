<?php namespace Hpolthof\Admin\Widget;

interface WidgetInterface
{
    public function render();

    public static function create();
}