<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'clients_id',
        'user_id',
        'price',
        'deadline',
    ];

    public $timestamps = false;

    public function clients(){
        return $this->belongsTo(Client::class, 'clients_id');
    }
}
