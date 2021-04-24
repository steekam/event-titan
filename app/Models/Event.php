<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'start_datetime',
        'end_datetime',
        'user_id',
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
    ];

    public function getStartDatetimeAttribute($start_datetime)
    {
        return $start_datetime ?? Carbon::parse($start_datetime)->format('F j, Y H:i');
    }

    public function getEndDatetimeAttribute($end_datetime)
    {
        return $end_datetime ?? Carbon::parse($end_datetime)->format('F j, Y H:i');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
