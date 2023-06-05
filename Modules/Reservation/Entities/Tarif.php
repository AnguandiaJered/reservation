<?php

namespace Modules\Reservation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarif extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['provenance','destination','heure_depart','heure_arriver','class_id','vol_id'];
    
    protected static function newFactory()
    {
        return \Modules\Reservation\Database\factories\TarifFactory::new();
    }

    public function tarif()
    {
        return $this->hasMany(Reservation::class,'tarif_id','id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class,'class_id','id');
    }

    public function vol()
    {
        return $this->belongsTo(Vol::class,'vol_id','id');
    }
}
