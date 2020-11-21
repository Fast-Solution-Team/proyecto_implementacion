<?php

namespace App\Http\Livewire;

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
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BillETERA')

            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')->where('movimientos_billeteras.MONTO_TRANSACCION', 'like', '%'.$this->search.'%')->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)->get();

        return view('livewire.envio-dinero-cliente')->with('envioscliente', $this->envioscliente);    }
}
