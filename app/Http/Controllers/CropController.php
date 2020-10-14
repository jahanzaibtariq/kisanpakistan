<?php

namespace App\Http\Controllers;

use App\Crop;
use Illuminate\Http\Request;
use DB;
use Session;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'crop');
        $sqlcrop = DB::select('select * from crop');
        if ($sqlcrop) 
        {
          return view('backend/crop/index', [ 'sqlcrop' => $sqlcrop ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Session::put('page', 'crop');
        return view('backend/crop/addCrop');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sql = DB::table('crop')->insert([
            ['cropName' => $request->cropName, 'cropDescription' => $request->cropDescription, 'min_humidity' => $request->min_humidity, 'max_humidity_per' => $request->max_humidity_per, 'min_PH' => $request->min_PH, 'max_ph_No' => $request->max_ph_No,'min_temp' => $request->min_temp, 'max_temp_C' => $request->max_temp_C ]
        ]);
        if ($sql) {
            return redirect('/admin/crop')->with('added', 'Data Successfully submitted.');
        }
        else
        {
            return redirect()->back()->with('not_added', 'Something is wrong, Try Again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function show(Crop $crop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Session::put('page', 'crop');
        $sql = DB::table('crop')->where('crop_id', '=', $id)->get();
        return view('backend/crop/updateCrop', [ 'sql' => $sql ]);
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
        $sql = DB::table('crop')->where('crop_id', $id)->update(['cropName' => $request->cropName, 'cropDescription' => $request->cropDescription, 'min_humidity' => $request->min_humidity, 'max_humidity_per' => $request->max_humidity_per, 'min_PH' => $request->min_PH, 'max_ph_No' => $request->max_ph_No,'min_temp' => $request->min_temp, 'max_temp_C' => $request->max_temp_C
        ]);   
        if($sql){
                return redirect('/admin/crop')->with('update', 'Data Successfully Update.');
        }else{
            return redirect()->back()->with('not_added', 'Something is wrong, Try Again.');
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crop $crop)
    {
        //
    }
    public function delete($id, $cropName)
    {
        // dd($cropName);
        // exit();
        $disease = DB::table('disease')->where('cropName', '=', $cropName)->delete();
        $fertilizer = DB::table('fertilizer')->where('cropName', '=', $cropName)->delete();
        $harvesting = DB::table('harvesting')->where('cropName', '=', $cropName)->delete();
        $landpreparation = DB::table('landpreparation')->where('cropName', '=', $cropName)->delete();
        $pesticides = DB::table('pesticides')->where('cropName', '=', $cropName)->delete();
        $cultivation = DB::table('cultivation')->where('cropName', '=', $cropName)->delete();
        $watering = DB::table('watering')->where('cropName', '=', $cropName)->delete();
        $weed = DB::table('weed')->where('cropName', '=', $cropName)->delete();
        $crop = DB::table('crop')->where('cropName', '=', $cropName)->delete();
        // dd($crop);
        // exit();
        if ($crop) {
            return redirect('/admin/crop')->with('dlete', 'Data Successfully Deleted.');
        }else{
            return redirect()->back()->with('not_added', 'Something is wrong, Try Again.');
        } 
    }
}
