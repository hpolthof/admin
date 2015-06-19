<?php namespace Hpolthof\Admin;

use Illuminate\Routing\Controller;

class AdminTasksController extends Controller
{
    public function index()
    {
        $items = AdminTask::whereUserId(\Auth::user()->id)->get();
        return $items;
    }
}