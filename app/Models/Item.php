<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $guarded = [];

    
    

    public function following()
    {
        return $this->belongsTo(Item::class, 'follow_item_id');
    }

}
