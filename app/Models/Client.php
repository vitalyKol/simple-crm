<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

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
