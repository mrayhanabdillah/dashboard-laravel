<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Config extends Model
{
    protected $fillable = [
        'title',
        'tnc',
        'no_rek',
        'bank',
        'name_rek'
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

    public function images()
    {
        return $this->hasMany(CarouselImage::class,'config_id');
    }
}
