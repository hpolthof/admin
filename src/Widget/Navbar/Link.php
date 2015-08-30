<?php namespace Hpolthof\Admin\Widget\Navbar;


class Link extends \Hpolthof\Admin\Widget\Link
{
    public function render()
    {
        $link = parent::render();
        return "<li>{$link}</li>";
    }

}