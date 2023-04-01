<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title', 'body', 'slug', 'image','user_id','cat_id'
    ];
    public function User()
    {                  
       return $this->belongsTo(User::class);//post of user

    }

    public function categories()
    {
        return $this->belongsTo(Categories::class,'cat_id','id');
    }


}
