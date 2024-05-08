<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = DB::table('supplier')->get();
        return response()->json([
            'data' => $post
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.supplier-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('supplier')->insert([
            'name_supplier' => $request->supplier,
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
        $post = DB::table('supplier')->find($id);
        return view('supplier.supplier-edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $post = DB::table('supplier')->where('id', $id)->update([
            'name_supplier' => $request->name_supplier,
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
        $post = DB::table('supplier')->where('id', $id)->delete();
        if ($post) {
            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        }
        return response()->json(['message' => 'Gagal menghapus data'], 500);
    }

}
