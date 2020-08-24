<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $primaryKey = 'item_id';
    protected $fillable = [
        'itemCode',
        'description',
        'unit'
    ];

    public $timestamps = false;
}
