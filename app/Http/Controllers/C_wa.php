<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class C_wa extends Controller
{
    public function get_wa()
    {        
        $katalog = DB::table('data_wa')->get();                      
        
        return view('admin', ['wa' => $wa]);        
    }
    
    
    public function tambah_wa(Request $request)
    {
        $validatedData = $request->validate([
            'no_wa' => 'required',
        ]);

        DB::table('data_wa')-> insert([            
            'no_wa' => $request -> no_wa,
                      
        ]);
        
        return redirect('/admin') -> with('success', 'Data WhatsApp Berhasil Ditambahkan');
    }

    public function edit_wa(Request $request)
    {
        {
            $validatedData = $request->validate([              
                'no_wa' => 'required',
            ]);
                        

    
            DB::table('data_wa') -> where('id_wa', '1') -> update([
                'no_wa' => $request -> no_wa,                         
            ]);
            
            return redirect('/admin') -> with('success', 'Data WhatsApp Berhasil DiRubah');
        }
    }

    public function edit_pesan(Request $request)
    {
        {
            $validatedData = $request->validate([              
                'pesan' => 'required',
            ]);
                        

    
            DB::table('data_wa') -> where('id_wa', '1') -> update([
                'pesan' => $request -> pesan,                         
            ]);
            
            return redirect('/admin') -> with('success', 'Pesan WhatsApp Berhasil DiRubah');
        }
    }

    public function hapus_wa($id)
    {
        DB::table('data_wa')->where('id_wa', $id)->delete();     
        return redirect('/admin')-> with('success', 'Data WA Berhasil DiHapus');
    }
}
