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

    public function scopeUnexpired($query){
        $date = date('Y-m-d', time());
        return $query->where('deadline','>',$date);
    }

    public function scopeStatuses($query, $status){
        return $query->where('status', '=', $status);
    }
}
