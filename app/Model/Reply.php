<?php

namespace App\Model;

use App\Model\Like;
use App\Model\User;
use App\Model\Question;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];
    
    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($reply) {
    //         $reply->user_id = auth()->id();
    //     });
    // }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }
}
