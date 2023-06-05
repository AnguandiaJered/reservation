<?php

namespace Modules\Paiement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['noms','sexe','adresse','etatcivil','email','fonction_id','contact','nationalite'];
    
    protected static function newFactory()
    {
        return \Modules\Paiement\Database\factories\AgentFactory::new();
    }

    public function fonction(){
        return $this->belongsTo(Fonction::class,'fonction_id','id');
    }

    public function agent()
    {
        return hasMany(Paiement::class,'agent_id','id');
    }
}
