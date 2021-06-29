<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class c_order extends Controller
{
    public function get_order() 
    {        
        $order = DB::table('order')->get();
        // dd($order);
        $wa = DB::table('data_wa')->get();                                              
        
        return view('daftarorder', ['order' => $order, 'wa' => $wa]);         
    }

    public function cari_order(Request $request) {
       
        $order = DB::table('order')->where('id_order','like',"%".$request->q."%")->orwhere('nama','like',"%".$request->q."%")->paginate();       
        $wa = DB::table('data_wa')->get();  
                          
        
        return view('daftarorder', ['order' => $order, 'wa' => $wa]);    
    }

    public function reset_order()
    {
        DB::table('keranjang')
        ->join('order', 'keranjang.id_session', '!=', 'order.id_session')                                        
        ->select('keranjang.*', 'order.*')                                       
        ->delete();

        return redirect('/daftarorder')-> with('success', 'Sampah Berhasil DiBersihkan');
    }

    public function hapus_order($id)
    {
        DB::table('order')->where('id_order', $id)->delete();     
        return redirect('/daftarorder')-> with('success', 'Order Berhasil DiHapus');
    }
}
