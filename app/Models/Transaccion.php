<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table='transacciones';
    use HasFactory;

    protected $fillable = [
        'ID_TRANSACCION', 'FECHA_TRANSACCION', 'ID_BILLETERA', 'ID_BILLETERA_DESTINO', 'TIPO_TRANSACCION', 'ID_SERVICIO'
        , 'ESTADO_TRANSACCION', 'ID_ERROR', 'USU_CRE', 'FEC_CRE', 'USU_MOD', 'FEC_MOD',
    ];
    const CREATED_AT = 'FEC_CRE';
    const UPDATED_AT = 'FEC_MOD';
}
