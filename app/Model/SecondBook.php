<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SecondBook extends Model
{
	protected $table = 'secondbooks';
    protected $primaryKey = 'secondbook_id';
    public $timestamps = false;

    protected $fillable = [
      'secondbook_id', 'user_id', 'book_name', 'author_name', 'price', 'years', 'image', 'created_at','updated_at' 
    ];
}
