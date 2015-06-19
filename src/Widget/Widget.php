<?php namespace Hpolthof\Admin\Widget;


abstract class Widget implements WidgetInterface
{
    public function __toString()
    {
        return $this->render();
    }

    public static function create()
    {
        $class = get_called_class();
        return (new $class);
    }

    public static function stringOrRender($item)
    {
        if(is_object($item)) {
            if(method_exists($item, 'render')) {
                return call_user_func([$item, 'render']);
            }

            if(method_exists($item, '__toString')) {
                return call_user_func([$item, '__toString']);
            }

            return '';
        }
        return $item;
    }
}