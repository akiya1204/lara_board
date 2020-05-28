<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complete extends Model
{
    protected $fillable = [
        'cmp_id',
        'customer_id',
        'item_id',
        'num',
        'delete_flg',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
