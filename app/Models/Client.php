<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'number',
        'activity',
        'user_id',
    ];

    public $timestamps = false;

    static function store($data){

    }
}
