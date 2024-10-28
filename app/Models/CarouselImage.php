<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CarouselImage extends Model
{
    protected $fillable = [
        'config_id',
        'filename'
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

    public function config()
    {
        return $this->belongsTo(Config::class,'config_id');
    }
}
