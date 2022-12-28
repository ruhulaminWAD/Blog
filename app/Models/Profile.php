<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['uesr_id', 'about', 'facebook', 'youtube', 'phone', 'mobile', 'address'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
