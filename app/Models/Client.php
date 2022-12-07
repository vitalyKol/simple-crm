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

    static function store($data)
    {
        self::create($data);
    }

    public function user()
    {
        return $this->belongsTo(Usercrm::class, 'user_id', 'id');
    }
}
