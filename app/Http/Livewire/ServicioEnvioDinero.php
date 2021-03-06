<?php

namespace App\Http\Livewire;

use App\Models\Billetera;
use App\Models\Movimiento;
use App\Models\SaldoBilletera;
use App\Models\Transaccion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ServicioEnvioDinero extends Component
{
    public $billetera;
    public $monto;
    public $openErrorBilletera;
    public $errorEnvio;
    public $openConfirmarEnvio;
    public $datos_usuario;


    public function render()
    {
        return view('livewire.servicio-envio-dinero');
    }

    public function enviardinero(){



        $validate = $this->validate([
            'billetera' => 'required',
            'monto' => 'required|numeric|min: 1'

        ], $messages = [
            'billetera.required' => 'La billetera es requerida para hacer el envio',
            'monto.required' => 'El monto es requerido para enviar el dinero',
            'monto.min' => 'No se aceptan numeros negativos.',
            'monto.numeric' => 'Debe ingresar un monto en numeros.'
        ]);

        $comprobarbilletera = Billetera::where('ID_BILLETERA', $this->billetera)->count();
        if ($comprobarbilletera > 0){

            $comprobarBilleteraUsuario = Billetera::where('ID_BILLETERA', $this->billetera)->pluck('BILLETERA_ASIGNADA')->first();

            if ($comprobarBilleteraUsuario == 'S'){


                if(Auth::user()->id_billetera == $this->billetera){

                    $this->errorEnvio = 'No puede enviar dinero a su misma billetera';
                    $this->openErrorBilletera = 'openErrorBilletera';
                }else {

                    $comprobarSaldo = Auth::user()->getSaldoAttribute() - $this->monto;
                    if ($comprobarSaldo >= 0) {

                        $cliente = User::where('id_billetera', $this->billetera)->get();
                        $this->datos_usuario = 'Seguro que quiere enviar dinero a: ' .$cliente[0]['name'].' '
                            .$cliente[0]['second_name'].' '.$cliente[0]['lastname'].' '.$cliente[0]['second_lastname'];

                        $this->openConfirmarEnvio = 'abrir';


                    } else {
                        $this->errorEnvio = 'No cuenta con saldo suficiente para hacer la transaccion';
                        $this->openErrorBilletera = 'openErrorBilletera';
                    }
                }


            }else{
                $this->errorEnvio = 'La billetera no esta asignada a un cliente';
                $this->openErrorBilletera = 'openErrorBilletera';
            }

        }else{
            $this->errorEnvio = 'La billetera no existe en el registro';
            $this->openErrorBilletera = 'openErrorBilletera';

        }
    }
    public function  confirmarEnvio(){
        $date = Carbon::now();

        $transaccion = new Transaccion();
        $transaccion->FECHA_TRANSACCION = $date;
        $transaccion->ID_BILLETERA = Auth::user()->id_billetera;
        $transaccion->ID_BILLETERA_DESTINO = $this->billetera;
        $transaccion->TIPO_TRANSACCION = 'ED';
        $transaccion->FEC_CRE = $date;
        $transaccion->ESTADO_TRANSACCION = 'E';
        $transaccion->USU_CRE = '@admin';

        $transaccion->save();

        $movimiento = new Movimiento();

        $saldo_posterior =  Auth::user()->getSaldoAttribute() -$this->monto;
        $movimiento->FECHA_MOVIMIENTO = $date;
        $movimiento->ID_TRANSACCION = $transaccion->id; // relacion entre la tabla transacciones y movimientos
        $movimiento->MONTO_TRANSACCION = $this->monto;
        $movimiento->SALDO_ANTERIOR = Auth::user()->getSaldoAttribute();
        $movimiento->SALDO_POSTERIOR = $saldo_posterior ;
        $movimiento->USU_CRE = '@admin';
        $movimiento->FEC_CRE = $date;

        $movimiento->save();

        // actualizacion del campo saldo
        SaldoBilletera::where('ID_BILLETERA', Auth::user()->id_billetera)->update(['SALDO_BILLETERA' => $saldo_posterior]);

        // recuperar el saldo que tiene actualmente la billetera destino
        $saldoAnteriorBilleteraDestino = SaldoBilletera::where('ID_BILLETERA', $this->billetera)->pluck('SALDO_BILLETERA')->first();

        // suma para el saldo billetera destino
        $saldoPosteriorBilleteraDestino = $saldoAnteriorBilleteraDestino + $this->monto;

        // actualizacion del campo saldo billetera por el saldo posterior
        SaldoBilletera::where('ID_BILLETERA', $this->billetera)->update(['SALDO_BILLETERA' => $saldoPosteriorBilleteraDestino]);

        session()->flash('ok', 'Transaccion Efectuada Exitosamente.');
       // retorna para recargar la pagina y actualiza el saldo
        return redirect('servicioenviodinero');

    }

    public function cerrarModal(){
        $this->errorEnvio = '';
        $this->openConfirmarEnvio = '';

        $this->openErrorBilletera = '';
    }

}
