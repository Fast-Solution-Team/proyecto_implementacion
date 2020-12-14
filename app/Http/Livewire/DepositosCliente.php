<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DepositosCliente extends Component
{
    public $search;
    private $depositoscliente;
    use WithPagination;
    public function render()
    {
        $this->depositoscliente = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('servicios', 'servicios.ID_SERVICIO', '=', 'transacciones.ID_SERVICIO')
            ->join( 'users', 'users.id_billetera', '=', 'transacciones.ID_BillETERA')

            ->select('servicios.*','movimientos_billeteras.*','transacciones.*' ,'users.*')

            ->where('movimientos_billeteras.MONTO_TRANSACCION', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.FECHA_MOVIMIENTO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.SALDO_ANTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.SALDO_POSTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)->paginate(5);

        // consulta sin los where
        $totaldepositos = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BILLETERA')
            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)->get();

        // count recibidos contiene todas las transaciones que se han hecho
        $countDepositos =$totaldepositos->count();

        $totalDepositos= 0;
        foreach ($totaldepositos as $value){
            $totalDepositos = $totalDepositos + $value->MONTO_TRANSACCION;

        }

        return view('livewire.depositos-cliente')->with('depositoscliente', $this->depositoscliente)
            ->with('countDepositos', $countDepositos)->with('totalDepositos', $totalDepositos);    }
}
