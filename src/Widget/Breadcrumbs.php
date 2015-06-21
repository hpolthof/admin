<?php namespace Hpolthof\Admin\Widget;

use Illuminate\Support\Collection;

class Breadcrumbs extends Widget
{
    protected $links;

    function __construct()
    {
        $this->links = new Collection();
    }

    public function render()
    {

    }

    public function addLink(Link $link)
    {
        $this->links->push($link);
    }

    public function count()
    {
        return $this->links->count();
    }

    public function all()
    {
        return $this->links->all();
    }
}