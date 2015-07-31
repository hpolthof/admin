<?php namespace Hpolthof\Admin\Widget;

trait Boxable
{
    public function renderWithBox($title, $class = '')
    {
        return Box::create()
            ->setTitle($title)
            ->setClass($class)
            ->setBody($this->render())
            ->render();
    }

}