<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Guest extends Model
{
    protected $fillable = [
        'payment_id',
        'username',
        'password',
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

    public function payment()
    {
        return $this->hasOne(PaymentTicket::class,'payment_id');
    }
}
