<?php namespace Hpolthof\Admin\Widget\Navbar;


use Hpolthof\Admin\Widget\Widget;

class Dropdown extends Widget
{
    protected $header;
    protected $footer;
    protected $content;
    protected $caption;

    public function render()
    {
        return view('admin::widget.navbar.dropdown', [
            'header' => $this->getHeader(),
            'footer' => $this->getFooter(),
            'content' => $this->getContent(),
            'caption' => $this->getCaption(),
        ]);
    }


    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param mixed $header
     * @return Dropdown
     */
    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param mixed $footer
     * @return Dropdown
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
        return $this;
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
     * @return Dropdown
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param mixed $caption
     * @return Dropdown
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }


}