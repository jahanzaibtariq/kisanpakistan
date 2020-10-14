<?php

namespace App\Http\Controllers;

use App\Harvesting;
use Illuminate\Http\Request;
use DB;
use Session;

class HarvestingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'harvesting');
        $harvestings = DB::select('SELECT * from harvesting');
        
        return view('backend/harvesting/index', [ 'harvestings' => $harvestings ]);
    }

    public function create()
    {
        Session::put('page', 'harvesting');
        return view('backend/harvesting/addHarvesting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sql = DB::table('harvesting')->insert([
            ['cropName' => $request->cropName, 'startHarvesting_day' => $request->startHarvesting_day, 'startHarvesting_month' => $request->startHarvesting_month, 'endHarvestin_day' => $request->endHarvestin_day, 'endHarvesting_month' => $request->endHarvesting_month, 'harvestingMethod' => $request->harvestingMethod]
        ]);

        if ($sql) {
            return redirect('/admin/harvesting')->with('added', 'Data Successfully submitted.');
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
        Session::put('page', 'harvesting');
        $sql = DB::table('harvesting')->where('id', '=', $id)->get();
        return view('backend/harvesting/updateHarvesting', [ 'sql' => $sql ]);
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
        $sql = DB::table('harvesting')->where('id', $id)->update(['cropName' => $request->cropName, 'startHarvesting_day' => $request->startHarvesting_day, 'startHarvesting_month' => $request->startHarvesting_month, 'endHarvestin_day' => $request->endHarvestin_day, 'endHarvesting_month' => $request->endHarvesting_month, 'harvestingMethod' => $request->harvestingMethod]);   
        if($sql){
                return redirect('/admin/harvesting')->with('update', 'Data Successfully Update.');
        }else{
                return redirect()->back()->with('not_added', 'Something is wrong, Try Again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fertilizer  $fertilizer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fertilizer $fertilizer)
    {
        //
    }
    public function delete($id)
    {
        $sql = DB::table('harvesting')->where('id', '=', $id)->delete();

        if ($sql) {
            return redirect('/admin/harvesting');
        }
        else 
        {
            return "Something is wrong";
        }
    }
}
