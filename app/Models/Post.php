<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{   use SoftDeletes;
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
