<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'event_id',
        'max_orders',
        'description',
        'price',
        'total_person',
        'terms_and_condition'
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
