<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasRoles, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $appends = [
        'role_id',
        'roleName',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'active' => 'boolean',
        'verified' => 'boolean',
    ];

    public static function getParsedPhone(string $key)
    {
        $phone = str_replace(' ', '', str_replace('+', '', request($key)));

        return substr($phone, -9);
    }

    public static function getParsedCountryCode(string $key)
    {
        $phone = str_replace(' ', '', str_replace('+', '', request($key)));

        return substr($phone, 0, -9);
    }

    public function getPhoneNumberAttribute()
    {
        return $this->country_code . $this->phone;
    }

    public static function findForSanctum(string $identifier, array $selects = ['*'])
    {
        return self::select($selects)->where('email', $identifier)
            ->orWhere('phone', self::getParsedPhone('phone'))
            ->first();
    }

    public function getRoles(): array
    {
        $role = [];

        foreach ($this->roles as $role) {
            $role = [
                'id' => $role->id,
                'name' => $role->name
            ];
        }

        return $role;
    }

    public function getRoleIdAttribute()
    {
        return $this->getRoles()['id'] ?? null;
    }

    public function getRoleNameAttribute()
    {
        return $this->getRoles()['name'] ?? null;
    }

    public function reservation()
    {
        return $this->hasMany(Modules\Reservation\Entities\Reservation::class, 'user_id','id');
    }
}
