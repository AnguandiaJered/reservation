<?php

namespace Modules\Reservation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vol extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['designation','num','nombre_place'];
    
    protected static function newFactory()
    {
        return \Modules\Reservation\Database\factories\VolFactory::new();
    }

    public function vol()
    {
        return $this->hasMany(Tarif::class,'vol_id','id');
    }
}
