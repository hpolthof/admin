<?php namespace Hpolthof\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminTask extends Model
{
    public function scopeActive($query, $active = true)
    {
        return $query->whereActive($active);
    }
}