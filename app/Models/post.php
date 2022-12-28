<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class post extends Model
{ 
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['title', 'slug', 'image', 'category_id', 'content', 'user_id'];

    protected $dete = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo('App\Models\category');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    } 
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}   
 
// ruhul 
