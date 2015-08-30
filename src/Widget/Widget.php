<?php namespace Hpolthof\Admin\Widget;


abstract class Widget implements WidgetInterface
{
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return static
     */
    public static function create()
    {
        return new static;
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