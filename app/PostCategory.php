<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = [
        'ctg_id',
        'category_name',
        'delete_flg',
    ];
}
