<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Participants extends Model
{
    protected $fillable = [
        'program_id',
        'name',
        'pob',
        'dob',
        'origin',
        'description',
        'photo',
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


    public function program()
    {
        return $this->belongsTo(Programs::class,'program_id');
    }

    public function votings()
    {
        return $this->hasMany(Voting::class,'voteType_id');
    }
}
