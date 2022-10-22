<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    protected $fillable = [
        'full_name','email','telephone','joinned_date', 'route_id', 'comments'
    ];
    public function routes()
    {
        return $this->belongsTo('App\Route');
    }
}
