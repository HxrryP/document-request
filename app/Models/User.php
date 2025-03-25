<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Permit;
use App\Models\RealPropertyTax;
use App\Models\Ordinance;
use App\Models\LocalCivilRegistry;
use App\Models\OccupationalPermit;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'password' => 'hashed',
    ];

    // In app/Models/User.php

public function permits() {
    return $this->hasMany(Permit::class);
}
public function realPropertyTaxes() {
    return $this->hasMany(RealPropertyTax::class);
}
public function ordinances(){
    return $this->hasMany(Ordinance::class);
}
public function localCivilRegistries(){
    return $this->hasMany(LocalCivilRegistry::class);
}
public function occupationalPermits(){
    return $this->hasMany(OccupationalPermit::class);
}

// ... (rest of the User model)
}
