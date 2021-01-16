<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $guarded=[];
    public $table="items";

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
