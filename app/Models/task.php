<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $fillable = [
        'task',
        'memo',
        'user_id',
    ];
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}
