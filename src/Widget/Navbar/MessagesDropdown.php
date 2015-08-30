<?php namespace Hpolthof\Admin\Widget\Navbar;


use Hpolthof\Admin\AdminException;
use Hpolthof\Admin\Widget\Navbar\Messages\BaseMessage;
use Illuminate\Support\Collection;

class MessagesDropdown extends IndicatorDropdown
{
    protected $items;

    public function __construct()
    {
        $this->items = new Collection();
    }

    public function render()
    {
        $content = '<ul class="menu">';
        foreach($this->items->all() as $item) {
            $content .= $item->render();
        }
        $content .= '</ul>';

        parent::setContent($content);

        return parent::render();
    }


    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param BaseMessage $item
     * @return MessagesDropdown
     */
    public function addItem(BaseMessage $item)
    {
        $this->items->push($item);
        return $this;
    }

    public function setContent($content)
    {
        throw new AdminException('Instance does not allow setContent, use addItem.');
    }

}