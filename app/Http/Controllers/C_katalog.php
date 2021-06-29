<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class C_katalog extends Controller
{
    public function get_katalog()
    {        
        $katalog = DB::table('katalog')->paginate(8); 
        $wa = DB::table('data_wa')->get();                              
        
        return view('admin', ['katalog' => $katalog, 'wa' => $wa]);        
    }

    public function cari_katalog(Request $request) {
        
        $katalog = DB::table('katalog')->where('nama_katalog','like',"%".$request->q."%")->paginate();               
        $wa = DB::table('data_wa')->get();                             
        
        return view('admin', ['katalog' => $katalog, 'wa' => $wa]);    
    }
    
    
    public function tambah_katalog(Request $request)
    {
        $validatedData = $request->validate([
            'nama_katalog' => 'required|max:255',
            'harga_katalog' => 'required',
            'jenis_katalog' => 'required',
            'stok_katalog' => 'required',            
            'deskripsi_katalog' => 'required',
        ]);

        $file       = $request->file('gambar');
        $fileName   = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move("images/", $fileName);

        DB::table('katalog')-> insert([
            'nama_katalog' => $request -> nama_katalog,
            'harga_katalog' => $request -> harga_katalog,
            'foto_katalog' => $fileName,
            'stok_katalog' => $request -> stok_katalog,
            'deskripsi_katalog' => $request -> deskripsi_katalog,
            'jenis_katalog' => $request -> jenis_katalog,
                      
        ]);
        
        return redirect('/admin') -> with('success', 'Data Katalog Berhasil Ditambahkan');
    }

    public function edit_katalog(Request $request)
    {
        {
            $validatedData = $request->validate([
                'nama_katalog' => 'required|max:255',
                'harga_katalog' => 'required',
                'jenis_katalog' => 'required',
                'stok_katalog' => 'required',            
                'deskripsi_katalog' => 'required',
            ]);
                        
            if ($request->file('gambar') != null) {
            $file       = $request->file('gambar');
            $fileName   = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move("images/", $fileName);
            }

            else {
                $fileName   = DB::table('katalog') -> where('id_katalog', $request -> id_katalog) -> value('foto_katalog');
            }
    
            DB::table('katalog') -> where('id_katalog', $request -> id_katalog) -> update([
                'nama_katalog' => $request -> nama_katalog,
                'harga_katalog' => $request -> harga_katalog,
                'foto_katalog' => $fileName,
                'stok_katalog' => $request -> stok_katalog,
                'deskripsi_katalog' => $request -> deskripsi_katalog,
                'jenis_katalog' => $request -> jenis_katalog,            
            ]);
            
            return redirect('/admin') -> with('success', 'Data Katalog Berhasil DiRubah');
        }
    }

    public function hapus_katalog($id)
    {
        DB::table('katalog')->where('id_katalog', $id)->delete();     
        return redirect('/admin')-> with('success', 'Katalog Berhasil DiHapus');
    }
}
