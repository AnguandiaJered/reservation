<?php

namespace Modules\Paiement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fonction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];
    
    protected static function newFactory()
    {
        return \Modules\Paiement\Database\factories\FonctionFactory::new();
    }

    public function fonction()
    {
        return hasMany(Agent::class,'fonction_id','id');
    }
}
