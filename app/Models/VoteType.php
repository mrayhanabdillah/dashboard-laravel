<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class VoteType extends Model
{
    protected $fillable = [
        'name',
        'price',
        'point',
        'bonus_point',
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

    public function votings()
    {
        return $this->hasMany(Voting::class,'voteType_id');
    }
}
