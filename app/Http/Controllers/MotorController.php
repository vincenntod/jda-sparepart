<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Motor;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = DB::table('motor')->
        leftjoin('brand', 'motor.id_brand', '=', 'brand.id')->
        leftjoin('sparepart', 'motor.id_sparepart', '=', 'sparepart.id')->
        leftjoin('category_motor', 'motor.id_category_motor', '=', 'category_motor.id')->
        select('*', 'motor.id')->get();
        return response()->json([
            'data' => $post
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = DB::table('brand')->get();
        $sparepart = DB::table('sparepart')->get();
        $category = DB::table('category_motor')->get();
        return view('motor.motor-add')->with(compact('brand'))->with(compact('sparepart'))->with(compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('motor')->insert([
            'name_motor' => $request->name_motor,
            'year_production' => $request->year_production,
            'id_brand' => $request->id_brand,
            'id_sparepart' => $request->id_sparepart,
            'id_category_motor' => $request->id_category_motor,
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
        $post = DB::table('motor')->
        leftjoin('brand', 'motor.id_brand', '=', 'brand.id')->
        leftjoin('sparepart', 'motor.id_sparepart', '=', 'sparepart.id')->
        leftjoin('category_motor', 'motor.id_category_motor', '=', 'category_motor.id')->where('motor.id', $id)->
        select('*', 'motor.id')->get();
        $brand = DB::table('brand')->get();
        $sparepart = DB::table('sparepart')->get();
        $category = DB::table('category_motor')->get();
        return view('motor.motor-edit', compact('post'))->with(compact('brand'))->with(compact('sparepart'))->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $post = DB::table('motor')->where('id', $id)->update([
            'name_motor' => $request->name_motor,
            'year_production' => $request->year_production,
            'id_brand' => $request->id_brand,
            'id_sparepart' => $request->id_sparepart,
            'id_category_motor' => $request->id_category_motor
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
        $post = DB::table('motor')->where('id', $id)->delete();
        if ($post) {
            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        }
        return response()->json(['message' => 'Gagal menghapus data'], 500);
    }

}
