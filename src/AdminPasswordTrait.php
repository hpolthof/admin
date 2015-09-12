<?php namespace Hpolthof\Admin;


use Illuminate\Foundation\Auth\ResetsPasswords;

trait AdminPasswordTrait
{
    use ResetsPasswords;

    public function getEmail()
    {
        return view('admin::auth.password', [
            'ctrl_name' => '\\'.static::class
        ]);
    }

    public function getReset($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        return view('admin::auth.reset', [
            'ctrl_name' => '\\'.static::class
        ])->with('token', $token);
    }
}