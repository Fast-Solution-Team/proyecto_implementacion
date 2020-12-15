<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'second_name','lastname', 'second_lastname',
        'fec_nac', 'identidad', 'sexo', 'estado_cliente',
        'id_billetera','direccion',
        'email', 'password', 'fec_mod', 'usu_mod'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url', 'saldo',
    ];

    public function getSaldoAttribute(){
        $saldo = SaldoBilletera::where('ID_BILLETERA', $this->id_billetera)->pluck('SALDO_BILLETERA')->first();
        return $saldo;
    }
    public function getMunicipio(){
        $direccion = Direcciones::where('identidad', $this->identidad)->pluck('municipio')->first();
        return $direccion;
    }
    public function getDepto(){
        $direccion = Direcciones::where('identidad', $this->identidad)->pluck('departamento')->first();
        return $direccion;
    }




}
