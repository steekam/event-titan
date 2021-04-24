<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function getStartDatetimeDisplayAttribute()
    {
        return $this->start_datetime ? Carbon::parse($this->start_datetime)->format('F j, Y H:i') : null;
    }

    public function getEndDatetimeDisplayAttribute()
    {
        return $this->end_datetime ? Carbon::parse($this->end_datetime)->format('F j, Y H:i') : null;
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hasPassed(): bool
    {
        return Carbon::now()->gt($this->start_datetime);
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query
            ->whereDate('start_datetime', '>=', Carbon::today()->toDateString())
            ->orderBy('start_datetime');
    }
}
