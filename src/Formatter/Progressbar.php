<?php namespace Hpolthof\Admin\Formatter;

use Hpolthof\Admin\AdminFormatter;

class Progressbar implements AdminFormatter
{
    public function format($value)
    {
        $percent = intval($value);
        if($percent > 100) $percent = 100;
        if($percent < 0) $percent =0;

        $todo = 100-$percent;

        return <<<EOF
<div class="progress" style='margin:0'>
  <div class="progress-bar progress-bar-success progress-bar-striped" style="width: $percent%">
    <span class="sr-only">$percent%</span>
  </div>
  <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: $todo%"></div>
</div>
EOF;
    }

}