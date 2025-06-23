<?php

namespace App\Http\Controllers;

use App\Models\Count;
use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index(){
        return view('aritmatika');
    }

    public function tambah(){
        $title = "Tambah-Tambahan";
        $jumlah = 0;
        $error = null;
        return view('tambah', compact('title', 'jumlah', 'error'));
        // return view('tambah', ['title', 'jumlah']);
        // return view('tambah', [$title, $jumlah]);
    }
    public function tambahAction(Request $request)
    {
        $request->validate(
            [
                'angka1' => 'required', 
                'angka2' => 'required' 
            ]
            );
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $error = null;
        $jumlah = null;

        if(!is_numeric($angka1) || !is_numeric($angka2))
        {
            $error = "Data harus numeric";
            return $error;
        }else
        {
            $jumlah = $angka1 + $angka2;
        }
        if($error==null){
            Count::create([
                'jenis' => $request->jenis,
                'angka1' => $angka1,
                'angka2' => $angka2,
                'hasil' => $jumlah
            ]);
        }
        // return redirect()->route('')->with('status', 'Berhasil simpan');
        return view('tambah', compact('jumlah', 'error'));
    }

    public function viewHitungan()
    {
        //SELECT * FROM counts, merupakan yang biasa digunakan di php, di bawah ini caranya jika menggunakan laravel
        $counts = Count::all();
        return view('data-hitungan', compact('counts'));
    }

    public function editDataHitung(string $id)
    {
        $title = "Edit ";
        $error = null;
        $jumlah = null;

        //SELECT * FROM counts WHERE id = $id
        $count = Count::findOrfail($id);
        $jenis = $count->jenis;

        if($jenis == "tambah"){
            return view('tambah.edit', compact('title', 'error', 'jumlah', 'count'));
        }
    }

    public function updateTambahan(Request $request, string $id)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        
        $count = $angka1 + $angka2;
        
        //SELECT * FROM counts WHERE id = $id
        //UPDATE FROM counts SET ......... WHERE id = $id
        $data = Count::findOrFail($id);
        $data->jenis = $request->jenis;
        $data->angka1 = $angka1;
        $data->angka2 = $angka2;
        $data->hasil = $count;
        $data->save();

        return redirect()->route('edit.data-hitung', $id)->with('status' . 'Data berhasil di update');

        //Cara lain
        // Count::Update(
        //     [
        //         'jenis' => $request->jenis,
        //          'angka1' => $angka1,
        //     ]
        // )
    }
}
