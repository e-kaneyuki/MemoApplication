<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'place',
        'detail',
        'user_id',
    ];
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
