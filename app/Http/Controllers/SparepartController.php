<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Sparepart;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = DB::table('sparepart')->
        leftjoin('supplier', 'sparepart.id_supplier', '=', 'supplier.id')->
        select('*', 'sparepart.id as id')->get();
        return response()->json([
            'data' => $post
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = DB::table('supplier')->get();
        return view('sparepart.sparepart-add', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('sparepart')->insert([
            'name_sparepart' => $request->name_sparepart,
            'price' => $request->price,
            'id_supplier' => $request->id_supplier,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return response()->json([
            'message' => 'success created data'
        ],200);
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
        $post = DB::table('sparepart')->
        leftjoin('supplier', 'sparepart.id_supplier', '=', 'supplier.id')->
        where('sparepart.id',$id)->select('*', 'sparepart.id as id')->get();
        $supplier = DB::table('supplier')->get();
        return view('sparepart.sparepart-edit', compact('post'))->with(compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $post = DB::table('sparepart')->where('id', $id)->update([
            'name_sparepart' => $request->name_sparepart,
            'price' => $request->price,
            'id_supplier' => $request->id_supplier,
        ]);
        return response()->json([
            'message' => 'success updated data'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = DB::table('sparepart')->where('id', $id)->delete();
        if ($post) {
            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        }
        return response()->json(['message' => 'Gagal menghapus data'], 500);
    }

}
