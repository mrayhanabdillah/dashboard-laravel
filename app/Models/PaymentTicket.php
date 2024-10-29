<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class PaymentTicket extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'ticket_id',
        'program_id',
        'proof_payments',
    ];

    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid(); // Menghasilkan UUID
        });
    }

    public function tickets()
    {
        return $this->belongsTo(Ticket::class,'ticket_id');
    }
    public function program()
    {
        return $this->belongsTo(Programs::class,'program_id');
    }

    public function guest()
    {
        return $this->hasOne(Guest::class,'payment_id');
    }

}
