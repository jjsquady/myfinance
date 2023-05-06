<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'description',
        'amount',
        'type',
        'activity_at'
    ];

    protected $casts = [
        'activity_at' => 'date'
    ];
}
