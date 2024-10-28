<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Voting extends Model
{
    protected $fillable = [
        'program_id',
        'participant_id',
        'voteType_id',
        'name',
        'email',
        'phone',
        'proof_payment',
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

    public function voteType()
    {
        return $this->belongsTo(VoteType::class,'voteType_id');
    }

    public function participant()
    {
        return $this->belongsTo(Participants::class,'participant_id');
    }
    public function programs()
    {
        return $this->belongsTo(Programs::class,'program_id');
    }


}
