<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

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
                $users = User::all(['id', 'name']);
                foreach($users as $user){
                    if($value == $user->id) return $user->name;
                }
                },
        );
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
