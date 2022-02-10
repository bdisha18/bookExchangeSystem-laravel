<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $primaryKey = 'document_id';
    protected $fillable = [
        'document_id', 'user_id', 'file', 'category_id', 'status', 'description', 'title',
        'created_at','updated_at'
        
    ];

    public function getMember()
    {
    	return $this->hasOne('App\Model\Member', 'user_id','user_id');
    }
}
