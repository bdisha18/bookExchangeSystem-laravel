<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'parent_id','category_name', 'type', 'description', 'image', 'created_at','updated_at'
    ];


    public function children()
    {
        return $this->hasMany('App\Model\Category', 'parent_id', 'id');
    }

}
