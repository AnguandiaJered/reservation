<?php

namespace Modules\Paiement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paiement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['reservation_id','agent_id','montant','devise'];
    
    protected static function newFactory()
    {
        return \Modules\Paiement\Database\factories\PaiementFactory::new();
    }

    public function agent()
    {
        return belongsTo(Agent::class,'agent_id','id');
    }

    public function reservation()
    {
        return belongsTo(Modules\Reservation\Entities\Reservation::class,'reservation_id','id');
    }
}
