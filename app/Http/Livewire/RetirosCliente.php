<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class RetirosCliente extends Component
{
    public $search;
    private $retiroscliente;
    use WithPagination;

    public function render()
    {

        $this->retiroscliente = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BillETERA')

            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')

            ->where('movimientos_billeteras.MONTO_TRANSACCION', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.FECHA_MOVIMIENTO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.SALDO_ANTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.SALDO_POSTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)->paginate(5);

        // consulta sin los where
        $totalretiros = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BILLETERA')
            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)->get();

       // count recibidos contiene todas las transaciones que se han hecho
        $countRetiros =$totalretiros->count();

        $totalRetiros= 0;
        foreach ($totalretiros as $value){
            $totalRetiros = $totalRetiros + $value->MONTO_TRANSACCION;

        }

        return view('livewire.retiros-cliente')->with('retiroscliente', $this->retiroscliente)
            ->with('countRetiros', $countRetiros)->with('totalRetiros', $totalRetiros);    }
}
