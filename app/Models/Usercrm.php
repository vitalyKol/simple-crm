<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usercrm extends Model
{
    use HasFactory;

    protected $table = 'userscrm';
    protected $fillable = [
        'first_name',
        'last_name',
        'position',
    ];

    public $timestamps = false;

    public function clients(){
        return $this->hasMany(Client::class, 'user_id');
    }
}
