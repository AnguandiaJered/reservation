<?php

namespace Modules\Reservation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id','tarif_id','date_depart'];
    
    protected static function newFactory()
    {
        return \Modules\Reservation\Database\factories\ReservationFactory::new();
    }

    public function reservation()
    {
        return hasMany(Modules\Paiement\Entities\Paiement::class,'reservation_id','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function tarif()
    {
        return $this->belongsTo(Tarif::class,'tarif_id','id');
    }
}
