<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'gender',
        'order_id',
        'email',
        'phone_number',
        'type',
        'ktp_number'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
