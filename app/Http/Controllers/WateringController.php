<?php

namespace App\Http\Controllers;

use App\Watering;
use Illuminate\Http\Request;
use DB;
use Session;

class WateringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'watering');
        $waterings = DB::select('SELECT * from watering');
        return view('backend/watering/index', [ 'waterings' => $waterings ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Session::put('page', 'watering');
        return view('backend/watering/addWatering');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sql = DB::table('watering')->insert(['cropName' => $request->cropName, 'wateringMethods' => $request->wateringMethods]); 
        if ($sql) {
            return redirect('/admin/watering')->with('added', 'Data Successfully submitted.');
        }
        else
        {
            return redirect()->back()->with('not_added', 'Something is wrong, Try Again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fertilizer  $fertilizer
     * @return \Illuminate\Http\Response
     */
    public function show(Fertilizer $fertilizer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fertilizer  $fertilizer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Session::put('page', 'watering');
        $sql = DB::table('watering')->where('id', '=', $id)->get();
        return view('backend/watering/updateWatering', [ 'sql' => $sql ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fertilizer  $fertilizer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $sql = DB::table('watering')->where('id', $id)->update(['cropName' => $request->cropName, 'wateringMethods' => $request->wateringMethods]);   
        if($sql){
                return redirect('/admin/watering')->with('update', 'Data Successfully Update.');
        }else{

            return redirect()->back()->with('not_added', 'Something is wrong, Try Again.');
        }
    }

    public function delete($id)
    {
        $sql = DB::table('watering')->where('id', '=', $id)->delete();

        if ($sql) {
            return redirect('/admin/watering');
        }
        else 
        {
            return "Something is wrong";
        }
    }
}
