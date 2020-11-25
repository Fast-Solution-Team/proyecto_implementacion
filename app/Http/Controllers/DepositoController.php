<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\SaldoBilletera;
use Illuminate\Support\Facades\DB;
class DepositoController extends Controller
{
    
    //
    public function index() {
        
        $iduser = 'HN0001';

        $saldobilletera = DB::select('SELECT * FROM emoney.saldo_billetera WHERE ID_BILLETERA = ?', [$iduser]);
       
        $idcliente = DB::select('SELECT ID_CLIENTE FROM emoney.billeteras_clientes WHERE ID_BILLETERA = ?', [$iduser]);

        $usuario = DB::select('SELECT CONCAT(PRIMER_NOMBRE," ",PRIMER_APELLIDO) AS usuario FROM emoney.clientes WHERE ID_CLIENTE = ?', [$idcliente[0]->ID_CLIENTE]);

        $datos = ['saldo'=> $saldobilletera[0]->SALDO_BILLETERA,
        'usuario'=> $usuario[0]->usuario,
         'id' => $iduser];
        
        return view('livewire.transacciones.deposito_efectivo', $datos);
    
    }

   

    public function update(Request $request) {
        
        $v = \Validator::make($request->all(), [
            'cantidad_dp' => 'required|numeric'
        ]);

        if ($v->fails())
        {
            
            $var = "Monto invalido";
            echo "<script> alert('".$var."'); </script>";
        
            $saldobilletera = DB::select('SELECT SALDO_BILLETERA FROM emoney.saldo_billetera WHERE ID_BILLETERA = ?', [$request->id]);

            $datos = ['saldo'=> $saldobilletera[0]->SALDO_BILLETERA,
            'usuario'=> $request->usuario,
            'id' => $request->id];
            
            return view('livewire.transacciones.deposito_efectivo', $datos);
        }

     
        $saldobilletera = DB::select('SELECT SALDO_BILLETERA FROM emoney.saldo_billetera WHERE ID_BILLETERA = ?', [$request->id]);
    


        if($request->cantidad_dp >= 100){
            if($request->cantidad_dp >20000){
                $var = "Maximo deposito es de Lps. 20000.00";
                echo "<script> alert('".$var."'); </script>";
            
                $saldobilletera = DB::select('SELECT SALDO_BILLETERA FROM emoney.saldo_billetera WHERE ID_BILLETERA = ?', [$request->id]);

                $datos = ['saldo'=> $saldobilletera[0]->SALDO_BILLETERA,
                'usuario'=> $request->usuario,
                'id' => $request->id];
                
                return view('livewire.transacciones.deposito_efectivo', $datos);
            }

            $monto_total= $saldobilletera[0]->SALDO_BILLETERA + $request->cantidad_dp;
        }else{
            $var = "Minimo deposito es de Lps. 100.00";
            echo "<script> alert('".$var."'); </script>";
        
            $saldobilletera = DB::select('SELECT SALDO_BILLETERA FROM emoney.saldo_billetera WHERE ID_BILLETERA = ?', [$request->id]);

            $datos = ['saldo'=> $saldobilletera[0]->SALDO_BILLETERA,
            'usuario'=> $request->usuario,
            'id' => $request->id];
            
            return view('livewire.transacciones.deposito_efectivo', $datos);
        }
        
        $update = DB::update('UPDATE emoney.saldo_billetera set SALDO_BILLETERA = ? where ID_BILLETERA = ?', [$monto_total,$request->id]);

        if($update > -1){
                $var = "Deposito exitoso";
                echo "<script> alert('".$var."'); </script>";

                $numtransa = DB::select('SELECT * FROM emoney.transacciones');
                $nummovimi = DB::select('SELECT * FROM emoney.movimientos_billeteras');
                $conteot = count($numtransa);
                $conteom = count($nummovimi);
                $mytime = Carbon::now();
                

                DB::insert('insert into emoney.transacciones(ID_TRANSACCION, FECHA_TRANSACCION, ID_BILLETERA, TIPO_TRANSACCION, ID_SERVICIO, ESTADO_TRANSACCION, ID_ERROR, USU_CRE, FEC_CRE) values (?,?,?,?,?,?,?,?,?)', [$conteot+1, $mytime,$request->id,'DP',1,'A',1, 'su',$mytime]);
               
               
                DB::insert('insert into emoney.movimientos_billeteras( ID_MOVIMIENTO, FECHA_MOVIMIENTO, ID_TRANSACCION, MONTO_TRANSACCION, SALDO_ANTERIOR, SALDO_POSTERIOR, USU_CRE, FEC_CRE)
                 values (?,?,?,?,?,?,?,?)', [$conteom+1, $mytime,$conteot+1,$request->cantidad_dp,$saldobilletera[0]->SALDO_BILLETERA,$monto_total, 'su',$mytime]);
               
                

                $saldobilletera = DB::select('SELECT SALDO_BILLETERA FROM emoney.saldo_billetera WHERE ID_BILLETERA = ?', [$request->id]);
    
                $datos = ['saldo'=> $saldobilletera[0]->SALDO_BILLETERA,
                'usuario'=> $request->usuario,
                'id' => $request->id];
                
                return view('livewire.transacciones.deposito_efectivo', $datos);
        }
        else{
           return 'fallo' ;
        }

    }

   

    


}
