<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table='movimientos_billeteras';
    use HasFactory;

    protected $fillable = [
        'ID_MOVIMIENTO', 'FECHA_MOVIMIENTO', 'ID_TRANSACCION', 'MONTO_TRANSACCION', 'SALDO_ANTERIOR', 'SALDO_POSTERIOR'
        , 'USU_CRE', 'FEC_CRE', 'USU_MOD', 'FEC_MOD',
    ];
    const CREATED_AT = false;
    const UPDATED_AT = false;
}
