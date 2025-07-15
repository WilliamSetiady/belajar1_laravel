<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $datas = User::all();

        //mengambil dari User dimana di order berdasarkan id, descending/menurun
        $datas = User::orderBy('id', 'desc')->get();
        $title = "Data user";
        return view('user.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Tambah user";
        return view('user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        User::create($request->all());
        toast('Data berhasil ditambah', 'success');

        return redirect()->to('user')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit user";
        //select all from user where id = idedit

        //menghasilkan blank bila tidak didapatkan datanya
        $user = User::find($id);

        //menghasilkan notfound bila tidak didapatkan datanya
        // $user = User::findOrFail($id); 

        //untuk foreign key
        // $user = User::where('id', $id)->first(); 

        return view('user.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // view edit
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = $request->password;
        }
        $user->save();
        return redirect()->to('user')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->to('user')->with('success', 'Hapus Berhasil');
    }
}
