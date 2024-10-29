<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Programs extends Model
{
    protected $fillable = [
        'name',
        'location',
        'description',
        'date_program',
        'time_program',
        'open_vote',
        'close_vote',
        'target_vote',
    ];

    // Tentukan key type
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid(); // Menghasilkan UUID
        });
    }

    public function participants()
    {
        return $this->hasMany(Participants::class,'program_id');
    }
    public function votings()
    {
        return $this->hasMany(Voting::class,'program_id');
    }
    public function payments()
    {
        return $this->hasMany(PaymentTicket::class,'program_id');
    }

}
