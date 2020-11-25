<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EnvioDineroCliente extends Component
{
    public $search;
    private $envioscliente;

    public function render()
    {
        $this->envioscliente = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=',
                'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BILLETERA_DESTINO')

            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')

            ->where('movimientos_billeteras.MONTO_TRANSACCION', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('transacciones.ID_BILLETERA_DESTINO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('users.name', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('users.second_name', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('users.lastname', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('users.second_lastname', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.id_billetera', '=', Auth::user()->id_billetera)


            ->orwhere('movimientos_billeteras.FECHA_MOVIMIENTO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.SALDO_ANTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.SALDO_POSTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('transacciones.id_billetera', '=', Auth::user()->id_billetera)->get();

        return view('livewire.envio-dinero-cliente')->with('envioscliente', $this->envioscliente);    }
}
