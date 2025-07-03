<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeOfServices;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $datas = Levels::all();

        //mengambil dari levels dimana di order berdasarkan id, descending/menurun
        $datas = TypeOfServices::orderBy('id', 'desc')->get();
        $title = "Data service";
        return view('service.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Tambah service";
        return view('service.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        TypeOfServices::create($request->all());
        return redirect()->to('service')->with('success', 'Data berhasil ditambah');
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
        $title = "Edit service";
        //select all from service where id = idedit

        //menghasilkan blank bila tidak didapatkan datanya
        $service = TypeOfServices::find($id);

        //menghasilkan notfound bila tidak didapatkan datanya
        // $service = TypeOfServices::findOrFail($id); 

        //untuk foreign key
        // $service = TypeOfServices::where('id', $id)->first(); 

        return view('service.edit', compact('service', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // view edit
        $service = TypeOfServices::find($id);
        $service->service_name = $request->service_name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->save();
        return redirect()->to('service')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $service = TypeOfServices::findOrFail($id);
        $service->delete();

        return redirect()->to('service')->with('success', 'Hapus Berhasil');
    }
}
