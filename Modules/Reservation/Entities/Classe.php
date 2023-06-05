<?php

namespace Modules\Reservation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['designation','prix'];
    
    protected static function newFactory()
    {
        return \Modules\Reservation\Database\factories\ClasseFactory::new();
    }

    public function classe()
    {
        return $this->hasMany(Tarif::class,'class_id','id');
    }
}
