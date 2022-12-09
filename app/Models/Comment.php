<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'commentable_id',
        'commentable_type',
    ];

    protected function commentableType():Attribute
    {
        return Attribute::make(
            get: fn ($value) => substr(strrchr($value, '\\'),1),
        );
    }
    protected function userId():Attribute
    {
        return Attribute::make(
            get: function($value){
                $users = Usercrm::all();
                foreach($users as $user){
                    if($value == $user->id) return $user->first_name;
                }
                },
        );
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
