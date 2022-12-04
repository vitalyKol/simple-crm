<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'deadline',
        'user_id',
    ];

    public $timestamps = false;
    static public array $options = [
        1 => 'Open',
        2 => 'Wait',
        3 => 'Close',
        4 => 'Cancel',
    ];

}
