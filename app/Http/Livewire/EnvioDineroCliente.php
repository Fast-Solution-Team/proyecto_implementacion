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
    public $Searchnombre;
    public $countUsuario;
    public function render()
    {
        $this->envioscliente = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=',
                'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BILLETERA')

            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')

            ->where('movimientos_billeteras.MONTO_TRANSACCION', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('transacciones.ID_BILLETERA_DESTINO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)


            ->orwhere('movimientos_billeteras.FECHA_MOVIMIENTO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.SALDO_ANTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.SALDO_POSTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)->get();


         if($this->envioscliente != '[]') {


             $this->envioscliente->first()->destino = '';

             foreach ($this->envioscliente as $value) {
                 $usuario = User::where('id_billetera', '=', $value->ID_BILLETERA_DESTINO)->get();

                 $this->countUsuario = $usuario->count();

                 if ($usuario) {
                     $value->destino = $usuario;

                 }

             }

         }else {

             $this->envioscliente = DB::table('movimientos_billeteras')
                 ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=',
                     'transacciones.ID_TRANSACCION')
                 ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BILLETERA')

                 ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')
                  ->where('transacciones.TIPO_TRANSACCION', '=','ED')
                 ->where('users.id_billetera', '=', Auth::user()->id_billetera)->get();


             foreach ($this->envioscliente as $value) {
                 $usuario = User::where('id_billetera', '=', $value->ID_BILLETERA_DESTINO)->where('name', 'like', '%' . $this->search . '%')
                    ->orwhere('id_billetera', '=', $value->ID_BILLETERA_DESTINO) ->where('second_name', 'like', '%' . $this->search . '%')
                     ->orwhere('id_billetera', '=', $value->ID_BILLETERA_DESTINO)->where('lastname', 'like', '%' . $this->search . '%')
                     ->orwhere('id_billetera', '=', $value->ID_BILLETERA_DESTINO)->where('second_lastname', 'like', '%' . $this->search . '%')
                     ->get();
                 $this->countUsuario = $usuario->count();
                  if ($usuario) {
                     $value->destino = $usuario;
                 }

             }
         }

        return view('livewire.envio-dinero-cliente')->with('envioscliente', $this->envioscliente)->with('countUsuario', $this->countUsuario);    }
}
