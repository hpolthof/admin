<?php namespace Hpolthof\Admin;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

trait AdminAuthTrait
{
    use AuthenticatesAndRegistersUsers;

    public function getLogin()
    {
        return view('admin::auth.login');
    }
}