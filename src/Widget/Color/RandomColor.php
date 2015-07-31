<?php namespace Hpolthof\Admin\Widget\Color;

use Hpolthof\Admin\Widget\Color;

class RandomColor extends Color
{
    public function __construct()
    {
        parent::__construct(rand(0, 255), rand(0, 255), rand(0, 255), 100);
    }
}