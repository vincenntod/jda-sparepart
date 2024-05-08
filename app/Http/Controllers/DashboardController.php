<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count_motor = DB::table('motor')->get()->count();
        $count_brand = DB::table('brand')->get()->count();
        $count_category = DB::table('category_motor')->get()->count();
        $count_sparepart = DB::table('sparepart')->get()->count();
        $count_supplier = DB::table('supplier')->get()->count();

        return view('dashboard', compact('count_motor'))
        ->with(compact('count_brand'))
        ->with(compact('count_category'))
        ->with(compact('count_sparepart'))
        ->with(compact('count_supplier'));
    }

    public function dataChartListMotor(){
        $result = DB::table('motor')
        ->leftJoin('brand', 'motor.id_brand', '=', 'brand.id')
        ->select(DB::raw('count(name_motor) as count'), 'name_brand')
        ->groupBy('name_brand')
        ->get();
        
        return response()->json([
            'message' => 'success',
            'result' => $result,
        ],200);
    }
}
