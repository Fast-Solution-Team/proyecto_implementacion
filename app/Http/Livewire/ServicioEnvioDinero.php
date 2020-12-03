<?php

namespace App\Http\Livewire;

use App\Models\Billetera;
use App\Models\Transaccion;
use App\Models\User;
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
            'monto' => 'required'

            ], $messages = [
                'billtera.required' => 'La billetera es requerida para hacer el envio',
                'monto.required' => 'El monto es requerido para enviar el dinero'
        ]);

        $comprobarbilletera = Billetera::where('ID_BILLETERA', $this->billetera)->count();
        if ($comprobarbilletera > 0){

            $comprobarBilleteraUsuario = Billetera::where('ID_BILLETERA', $this->billetera)->pluck('BILLETERA_ASIGNADA')->first();

            if ($comprobarBilleteraUsuario == 'S'){


                if(Auth::user()->id_billetera == $this->billetera){

                    $this->errorEnvio = 'No puede enviarse dinero a su misma billetera no sea bruto';
                    $this->openErrorBilletera = 'openErrorBilletera';
                }else {

                    $comprobarSaldo = Auth::user()->getSaldoAttribute() - $this->monto;
                    if ($comprobarSaldo > 0) {

                        $cliente = User::where('id_billetera', $this->billetera)->get();
                        $this->datos_usuario = 'Seguro que quiere enviar dinero a: ' . $cliente[0]['name'].' '
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



    }

    public function cerrarModal(){
        $this->errorEnvio = '';
        $this->openConfirmarEnvio = '';

        $this->openErrorBilletera = '';
    }
}
