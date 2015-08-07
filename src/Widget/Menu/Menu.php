<?php namespace Hpolthof\Admin\Widget\Menu;


use Hpolthof\Admin\Widget\Widget;
use Illuminate\Support\Collection;

class Menu extends Widget
{
    protected $items;
    protected $title;
    protected $icon;
    protected $url;
    protected $active = false;
    protected $indicator;

    public function __construct($title, $icon = null, $url = null, $indicator = null)
    {
        $this->items = new Collection();
        $this->title = $title;
        $this->icon = $icon;
        $this->url = $url;
        $this->indicator = $indicator;
    }

    public function addMenu(Menu $menu)
    {
        $this->items->push($menu);
        return $this;
    }

    public function addItem(Item $item)
    {
        $this->items->push($item);
        return $this;
    }

    public function addUnsafe($item)
    {
        $this->items->push($item);
        return $this;
    }

    public function containsUrl($url)
    {
        foreach($this->items->all() as $item) {
            if($item instanceof Menu) {
                if($item->containsUrl($url)) {
                    return true;
                }
            } else {
                if($item->containsUrl($url)) {
                    return true;
                }
            }
        }
        return false;
    }

    public function render()
    {
        return view('admin::widget.menu.menu', [
            'indicator' => $this->indicator,
            'title' => $this->title,
            'icon' => $this->icon,
            'items' => $this->items,
            'url' => $this->url,
            'active' => $this->containsUrl(\Request::url()),
        ]);
    }


}