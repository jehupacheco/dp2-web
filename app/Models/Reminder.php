<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reminder extends Model
{
    use SoftDeletes;

    protected $fillable = ['description'];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
