<?php namespace Hpolthof\Admin\Widget;


abstract class Widget implements WidgetInterface
{
    public function __toString()
    {
        return $this->render();
    }

    public static function getInstance()
    {
        $class = get_class();
        return (new $class);
    }
}