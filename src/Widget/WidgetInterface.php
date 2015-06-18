<?php namespace Hpolthof\Admin\Widget;


use Illuminate\Support\Collection;

interface WidgetInterface
{
    public function render();

    public static function getInstance();
}