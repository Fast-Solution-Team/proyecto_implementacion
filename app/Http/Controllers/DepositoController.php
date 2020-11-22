<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\SaldoBilletera;
use Illuminate\Support\Facades\DB;
class DepositoController extends Controller
{
    
    //
    public function index(Request $request) {
        

        $saldobilletera = DB::select('SELECT * FROM emoney.saldo_billetera WHERE ID_BILLETERA = ?', [$request->iduser]);
       
        $idcliente = DB::select('SELECT ID_CLIENTE FROM emoney.billeteras_clientes WHERE ID_BILLETERA = ?', [$request->iduser]);

        $usuario = DB::select('SELECT CONCAT(PRIMER_NOMBRE," ",PRIMER_APELLIDO) AS usuario FROM emoney.clientes WHERE ID_CLIENTE = ?', [$idcliente[0]->ID_CLIENTE]);

        return view('deposito',
            ['saldo'=> $saldobilletera[0]->SALDO_BILLETERA,
                'usuario'=> $usuario[0]->usuario,
                 'id' => $request->iduser]);
    
    }

   

    public function update(Request $request) {
        
        $v = \Validator::make($request->all(), [
            'cantidad_dp' => 'required|numeric'
        ]);

        if ($v->fails())
        {
            
            $var = "Monto invalido";
            echo "<script> alert('".$var."'); </script>";
        
            $saldobilletera = DB::select('SELECT SALDO_BILLETERA FROM emoney.saldo_billetera WHERE ID_BILLETERA = ?', [$request->idusu]);

            return view('deposito',['saldo'=> $saldobilletera[0]->SALDO_BILLETERA,
            'usuario'=> $request->cliente,
            'id' => $request->idusu]);
            
        }

     
        $saldobilletera = DB::select('SELECT SALDO_BILLETERA FROM emoney.saldo_billetera WHERE ID_BILLETERA = ?', [$request->idusu]);
    


        if($request->cantidad_dp >= 100){
            if($request->cantidad_dp >20000){
                $var = "Maximo deposito es de Lps. 20000.00";
                echo "<script> alert('".$var."'); </script>";
            
                $saldobilletera = DB::select('SELECT SALDO_BILLETERA FROM emoney.saldo_billetera WHERE ID_BILLETERA = ?', [$request->idusu]);

                return view('deposito',['saldo'=> $saldobilletera[0]->SALDO_BILLETERA,
                'usuario'=> $request->cliente,
                'id' => $request->idusu]);
            }

            $monto_total= $saldobilletera[0]->SALDO_BILLETERA + $request->cantidad_dp;
        }else{
            $var = "Minimo deposito es de Lps. 100.00";
            echo "<script> alert('".$var."'); </script>";
        
            $saldobilletera = DB::select('SELECT SALDO_BILLETERA FROM emoney.saldo_billetera WHERE ID_BILLETERA = ?', [$request->idusu]);

            return view('deposito',['saldo'=> $saldobilletera[0]->SALDO_BILLETERA,
            'usuario'=> $request->cliente,
            'id' => $request->idusu]);
        }
        
        $update = DB::update('UPDATE emoney.saldo_billetera set SALDO_BILLETERA = ? where ID_BILLETERA = ?', [$monto_total,$request->idusu]);

        if($update > -1){
                $var = "Deposito exitoso";
                echo "<script> alert('".$var."'); </script>";

                $numtransa = DB::select('SELECT * FROM emoney.transacciones');
                $nummovimi = DB::select('SELECT * FROM emoney.movimientos_billeteras');
                $conteot = count($numtransa);
                $conteom = count($nummovimi);
                $mytime = Carbon::now();
                

                DB::insert('insert into emoney.transacciones(ID_TRANSACCION, FECHA_TRANSACCION, ID_BILLETERA, TIPO_TRANSACCION, ID_SERVICIO, ESTADO_TRANSACCION, ID_ERROR, USU_CRE, FEC_CRE) values (?,?,?,?,?,?,?,?,?)', [$conteot+1, $mytime,$request->idusu,'DP',1,'A',1, 'su',$mytime]);
               
               
                DB::insert('insert into emoney.movimientos_billeteras( ID_MOVIMIENTO, FECHA_MOVIMIENTO, ID_TRANSACCION, MONTO_TRANSACCION, SALDO_ANTERIOR, SALDO_POSTERIOR, USU_CRE, FEC_CRE)
                 values (?,?,?,?,?,?,?,?)', [$conteom+1, $mytime,$conteot+1,$request->cantidad_dp,$saldobilletera[0]->SALDO_BILLETERA,$monto_total, 'su',$mytime]);
               
                

                $saldobilletera = DB::select('SELECT SALDO_BILLETERA FROM emoney.saldo_billetera WHERE ID_BILLETERA = ?', [$request->idusu]);
    
                return view('deposito',['saldo'=> $saldobilletera[0]->SALDO_BILLETERA,
                'usuario'=> $request->cliente,
                'id' => $request->idusu]);
        }
        else{
           return 'fallo' ;
        }

    }

   

    


}
