<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DineroRecibidoCliente extends Component
{
    public $search;
    private $recibidoscliente;

    public function render()
    {
        $this->recibidoscliente = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=',
                'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BILLETERA')

            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')

            ->where('movimientos_billeteras.MONTO_TRANSACCION', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.ID_BILLETERA_DESTINO', '=', Auth::user()->id_billetera)

            ->orwhere('transacciones.ID_BILLETERA_DESTINO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.ID_BILLETERA_DESTINO', '=', Auth::user()->id_billetera)

            ->orwhere('users.name', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.ID_BILLETERA_DESTINO', '=', Auth::user()->id_billetera)

            ->orwhere('users.second_name', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.ID_BILLETERA_DESTINO', '=', Auth::user()->id_billetera)

            ->orwhere('users.lastname', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.ID_BILLETERA_DESTINO', '=', Auth::user()->id_billetera)

            ->orwhere('users.second_lastname', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.ID_BILLETERA_DESTINO', '=', Auth::user()->id_billetera)


            ->orwhere('movimientos_billeteras.FECHA_MOVIMIENTO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.ID_BILLETERA_DESTINO', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.SALDO_ANTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.ID_BILLETERA_DESTINO', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.SALDO_POSTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.ID_BILLETERA_DESTINO', '=', Auth::user()->id_billetera)->get();



        $totalrecibidos = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BILLETERA')
            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')
            ->where('transacciones.ID_BILLETERA_DESTINO', '=', Auth::user()->id_billetera)->get();


        $countRecibidos =$totalrecibidos->count();
        $totalRecibido= 0;
        foreach ($totalrecibidos as $value){
            $totalRecibido = $totalRecibido + $value->MONTO_TRANSACCION;

        }

        return view('livewire.dinero-recibido-cliente')->with('recibidoscliente', $this->recibidoscliente)
            ->with('countRecibidos', $countRecibidos)->with('totalRecibido', $totalRecibido);    }
}
