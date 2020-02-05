<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
   
    //
    protected $table = 'members';
    protected $fillable = ['title', 'body', 'cover_image'];
    
    public $primaryKey = 'id';
    
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
