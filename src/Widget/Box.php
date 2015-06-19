<?php namespace Hpolthof\Admin\Widget;


class Box extends Widget
{
    public $title;
    public $header;
    public $footer;
    public $body;

    /**
     * @param mixed $title
     * @return Box
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param mixed $header
     * @return Box
     */
    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @param mixed $footer
     * @return Box
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @param mixed $body
     * @return Box
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function render()
    {
        return view('admin::widget.box', ['box' => $this]);
    }
}