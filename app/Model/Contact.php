<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $table = 'contacts';
    protected $primaryKey = 'contact_id';
    public $timestamps = false;

    protected $fillable = [
      'contact_id', 'user_id', 'name', 'email', 'message','created_at','updated_at' 
    ];
}
