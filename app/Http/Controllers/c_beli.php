<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class c_beli extends Controller
{
    public function get_katalog(Request $request) {

        $sid = session()->getId();
        $katalog = DB::table('katalog')->paginate(8); 
        $knew = DB::table('katalog')->orderBy('stok_katalog', 'ASC')->limit(4)->get();
        $titem = DB::table('keranjang')->where('id_session','=', $sid)->count();
        $wa = DB::table('data_wa')->get();  
        //session()->regenerate();        
        //dd($titem);                            
        
        return view('toko', ['katalog' => $katalog,  'knew' => $knew, 'titem' => $titem, 'wa' => $wa, 'sid' => $sid]);    
    }

    public function get_baju(Request $request) {

        $sid = session()->getId();
        $katalog = DB::table('katalog')->where('jenis_katalog', 'baju')->paginate(8); 
        $knew = DB::table('katalog')->orderBy('stok_katalog', 'ASC')->limit(4)->get();
        $titem = DB::table('keranjang')->where('id_session','=', $sid)->count();
        $wa = DB::table('data_wa')->get();  
        //session()->regenerate();        
        //dd($titem);                            
        
        return view('toko', ['katalog' => $katalog,  'knew' => $knew, 'titem' => $titem, 'wa' => $wa, 'sid' => $sid]);    
    }

    public function get_celana(Request $request) {

        $sid = session()->getId();
        $katalog = DB::table('katalog')->where('jenis_katalog', 'celana')->paginate(8); 
        $knew = DB::table('katalog')->orderBy('stok_katalog', 'ASC')->limit(4)->get();
        $titem = DB::table('keranjang')->where('id_session','=', $sid)->count();
        $wa = DB::table('data_wa')->get();  
        //session()->regenerate();        
        //dd($titem);                            
        
        return view('toko', ['katalog' => $katalog,  'knew' => $knew, 'titem' => $titem, 'wa' => $wa, 'sid' => $sid]);    
    }

    public function cari_katalog(Request $request) {

        $sid = session()->getId();
        $katalog = DB::table('katalog')->where('nama_katalog','like',"%".$request->q."%")->paginate();
        $knew = DB::table('katalog')->orderBy('stok_katalog', 'ASC')->limit(4)->get();
        $titem = DB::table('keranjang')->where('id_session','=', $sid)->count();
        $wa = DB::table('data_wa')->get();  
        //session()->regenerate();        
        //dd($titem);                            
        
        return view('toko', ['katalog' => $katalog,  'knew' => $knew, 'titem' => $titem, 'wa' => $wa, 'sid' => $sid]);    
    }

    public function get_keranjang(Request $request) {

        $sid = session()->getId();      
        $titem = DB::table('keranjang')->where('id_session','=', $sid)->count();  
        $keranjang = DB::table('keranjang')
                    ->join('katalog', 'keranjang.id_katalog', '=', 'katalog.id_katalog')                                        
                    ->select('keranjang.*', 'katalog.*')
                    ->where('keranjang.id_session', '=', $sid)                                        
                    ->get();
        $wa = DB::table('data_wa')->get();  
        //session()->regenerate();        
        //dd($sid);                            
        
        return view('keranjang', ['keranjang' => $keranjang, 'titem' => $titem, 'wa' => $wa, 'sid' => $sid]);    
    }

    public function tambah_keranjang($id)
    {
        $sid = session()->getId();
                
        DB::table('keranjang')-> insert([
            'id_session' => $sid,
            'id_katalog' => $id,            
            'jumlah' => '1',
                      
        ]);
        
        return redirect('/') -> with('success', 'Katalog Berhasil Ditambahkan, Silahkan Cek Keranjang Anda');    
    }

    public function checkout(Request $request)
    {                
        $sid = session()->getId();        
        $cek = DB::table('order')->where('id_session', $sid)->first();
        $keranjang = DB::table('keranjang')
                    ->join('katalog', 'keranjang.id_katalog', '=', 'katalog.id_katalog')                                        
                    ->select('keranjang.*', 'katalog.*')
                    ->where('keranjang.id_session', '=', $sid)
                    ->decrement('katalog.stok_katalog', 1);     
        if($cek == null) {                    
            DB::table('order')-> insert([
                'id_session' => $sid,            
                'total_harga' => $request -> total_harga,
                'nama' => $request -> nama,
                'alamat' => $request -> alamat,
                'tanggal' => date('Y-m-d'),
                'status_order' => 'pending'             
            ]);        
        }
        else {
            //Nothing
        }
        $order = DB::table('order')->where('id_session', $sid)->value('id_order'); 
        $wa = DB::table('data_wa')->where('id_wa', '1')->value('no_wa');
        $pesan = DB::table('data_wa')->where('id_wa', '1')->value('pesan');
        $text = urlencode($pesan);
        session()->regenerate();
        return redirect('http://wa.me/62'.$wa.'?text='.$text.' ORDER'.$order.'BJS');
    }

    public function hapus_keranjang($id)
    {
        $sid = session()->getId();
        DB::table('keranjang')->where('id_katalog', $id)->where('id_session', $sid)->delete();     
        return redirect('/')-> with('success', 'Item  Berhasil DiHapus');
    }
}
