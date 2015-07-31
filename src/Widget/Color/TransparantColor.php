<?php namespace Hpolthof\Admin\Widget\Color;

class TransparantColor extends Color
{
    public function __construct()
    {
        parent::__construct(255, 255, 255, 0);
    }
}