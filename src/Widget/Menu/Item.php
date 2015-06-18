<?php namespace Hpolthof\Admin\Widget\Menu;


use Hpolthof\Admin\Widget\Widget;

class Item extends Widget
{
    protected $title;
    protected $icon;
    protected $url;

    public function __construct($title, $url, $icon = null)
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->url = $url;
    }


    public function getUrl()
    {
        return $this->url;
    }

    public function containsUrl($url)
    {
        if($this->getUrl() === $url) {
            return true;
        }
        return false;
    }

    public function render()
    {
        return view('admin::widget.menu.item', [
            'title' => $this->title,
            'icon' => $this->icon,
            'url' => $this->url,
            'active' => $this->containsUrl(\Request::url()),
        ]);
    }

}