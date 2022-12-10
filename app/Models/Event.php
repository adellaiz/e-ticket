<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'start_date',
        'end_date',
        'publish_date',
        'event_date',
        'event_time',
        'location',
        'created_by'
    ];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function creator(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
