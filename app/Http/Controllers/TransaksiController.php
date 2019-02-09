<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\User;
use Session;

class TransaksiController extends Controller
{
    public function setor(){
        $users   =  User::All();
        return view('transaksi.setor',compact('users'));
    }
    public function storesetor(Request $request){
        $setor = new Transaksi;
        $setor->jenis = "kredit";
        $setor->bulan = date('n');
        $setor->user_id = $request->user_id;
        $setor->nominal = $request->nominal;
        if($setor->save()){
            Session::flash('message', 'Setor Tunai Berhasil di lakukan.'); 
            Session::flash('alert-class', 'alert-success'); 
        }
        return redirect()->route('transaksi.setor');
    }
    public function mutasi(Request $req){
        $users   =  User::All();
        if($req->ajax()){
            $result = Transaksi::where('user_id',$req->user_id)->get();
            return view('transaksi/mutasi',compact('result'));
        }else{
            return view('transaksi.search_mutasi',compact('users'));
        }
    }
    public function penarikan(Request $req){
        $result = Transaksi::where('user_id',$req->user_id)->get();
        $no = 1;
        $subtotal_plg = $subtotal_thn = $total = $bunga = 0;
        foreach ($result as $key => $row)
        {
            $bunga_perbulan=6/12;
            $subtotal_plg += $row['nominal'];
            if($row["jenis"] == "kredit"){
                $subtotal_thn += $row['nominal'];
            }
            $bunga  =  $subtotal_thn*$bunga_perbulan/100;
            if (@$result[$key+1]['bulan'] != $row['bulan']) {
                $total += $subtotal_thn-$bunga;;
                    $subtotal_thn = 0;
            } 
            if($row['jenis'] == "debit"){
                echo $total = $total-$row['nominal'];
            }  
        }
        if($req->nominal <= $total){
            $setor = new Transaksi;
            $setor->jenis = "debit";
            $setor->bulan = date('n');
            $setor->user_id = $req->user_id;
            $setor->nominal = $req->nominal;
            if($setor->save()){
                Session::flash('message', 'Penarikan Tunai Berhasil di lakukan.'); 
                Session::flash('alert-class', 'alert-success'); 
            }
            }else{
                Session::flash('message', 'Saldo Tidak cukup.'); 
                Session::flash('alert-class', 'alert-danger'); 
            }
        return redirect()->route('transaksi.penarikan');
    }
    public function getsaldo(){
        $users   =  User::All();
        return view('transaksi.penarikan',compact('users','total'));
    }
}
