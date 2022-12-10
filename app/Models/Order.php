<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    const TYPE_CUSTOMER = "CUSTOMER";
    const TYPE_VISITOR = "VISITOR";
    const STATUS_PAID = "PAID";
    const STATUS_UNPAID = "UNPAID";
    const STATUS_CANCELED = "CANCELLED";
    const STATUS_EXPIRED = "EXPIRED";

    protected $fillable = [
        'booking_code',
        'ticket_id',
        'status',
        'snap_token'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->booking_code = strtoupper(Str::random(12));
    }

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

    public function customer(){
        return $this->hasOne(CustomerOrder::class)->where('type', self::TYPE_CUSTOMER);
    }

    public function visitors(){
        return $this->hasMany(CustomerOrder::class)->where('type', self::TYPE_VISITOR);
    }

    public function users(){
        return $this->hasMany(CustomerOrder::class);
    }
}
