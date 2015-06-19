<?php namespace Hpolthof\Admin;

use Illuminate\Contracts\Pagination\Presenter;
use Illuminate\Pagination\BootstrapThreePresenter;

class AdminPaginatorPresenter extends BootstrapThreePresenter implements Presenter
{
    public function render()
    {
        if ($this->hasPages()) {
            return sprintf(
                '<ul class="pagination pagination-sm no-margin">%s %s %s</ul>',
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
            );
        }
        return '';
    }
}