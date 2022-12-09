<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usercrm extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'userscrm';
    protected $fillable = [
        'first_name',
        'last_name',
        'position',
    ];

    public $timestamps = false;

    public function clients()
    {
        return $this->hasMany(Client::class, 'user_id');
    }
}
