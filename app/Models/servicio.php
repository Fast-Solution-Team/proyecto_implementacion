<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 *  @property string ID_SERVICIO
 *  @property double NOMBRE
 *  @property string DESCRIPCION
 *  @property string ESTADO_SERVICIO
 *  @property string USU_CRE
 *  @property string FEC_CRE
 */


class servicio extends Model
{
    use HasFactory;

    protected $table='servicios';

    protected $fillable = [
        'ID_SERVICIO', 'NOMBRE','DESCRIPCION', 'ESTADO_SERVICIO',
        'USU_CRE', 'FEC_CRE', 'USU_MOD', 'FEC_MOD'
    ];
    
}
