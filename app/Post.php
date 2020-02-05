<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
   
    //
    protected $table = 'posts';
    protected $fillable = ['title', 'body', 'cover_image'];
    
    public $primaryKey = 'id';
    
    public $timestamps = true;
    public $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
