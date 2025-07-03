<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $datas = Levels::all();

        //mengambil dari levels dimana di order berdasarkan id, descending/menurun
        $datas = Customers::orderBy('id', 'desc')->get();
        $title = "Data Pelanggan";
        return view('customer.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Tambah Pelanggan";
        return view('customer.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Customers::create($request->all());
        return redirect()->to('customer')->with('success', 'Data berhasil ditambah');
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
        $title = "Edit Pelanggan";
        //select all from customer where id = idedit

        //menghasilkan blank bila tidak didapatkan datanya
        $customer = Customers::find($id);

        //menghasilkan notfound bila tidak didapatkan datanya
        // $customer = Customers::findOrFail($id); 

        //untuk foreign key
        // $customer = Customers::where('id', $id)->first(); 

        return view('customer.edit', compact('customer', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // view edit
        $customer = Customers::find($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
        return redirect()->to('customer')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $customer = Customers::findOrFail($id);
        $customer->delete();

        return redirect()->to('customer')->with('success', 'Hapus Berhasil');
    }
}
