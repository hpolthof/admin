<?php namespace Hpolthof\Admin\Widget\Navbar\Messages;

use Hpolthof\Admin\Widget\Widget;

class BaseMessage extends Widget
{
    protected $content;

    public function render()
    {
        return "<li>{$this->content}</li>";
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return BaseMessage
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}