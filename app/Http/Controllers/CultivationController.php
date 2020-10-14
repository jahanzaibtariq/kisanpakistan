<?php

namespace App\Http\Controllers;

use App\Cultivation;
use Illuminate\Http\Request;
use DB;
use Session;

class CultivationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'cultivation');
        $cultivations = DB::select('SELECT * from cultivation');
        return view('backend/cultivation/index', [ 'cultivations' => $cultivations ]);
    }

    public function create()
    {
        Session::put('page', 'cultivation');
        return view('backend/cultivation/addCultivation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sql = DB::table('cultivation')->insert([
            ['cropName' => $request->cropName, 'startCultivate_day' => $request->startCultivate_day, 'startCultivate_month' => $request->startCultivate_month, 'endCultivate_day' => $request->endCultivate_day, 'endCultivate_month' => $request->endCultivate_month]
        ]);

        if ($sql) {
            return redirect('/admin/cultivation')->with('added', 'Data Successfully submitted.');
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
        Session::put('page', 'cultivation');
        $sql = DB::table('cultivation')->where('id', '=', $id)->get();
        return view('backend/cultivation/updateCultivation', [ 'sql' => $sql ]);
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
        $sql = DB::table('cultivation')->where('id', $id)->update(['cropName' => $request->cropName, 'startCultivate_day' => $request->startCultivate_day, 'startCultivate_month' => $request->startCultivate_month, 'endCultivate_day' => $request->endCultivate_day, 'endCultivate_month' => $request->endCultivate_month]);   
        if($sql){
                return redirect('/admin/cultivation')->with('update', 'Data Successfully Update.');
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
        $sql = DB::table('sowing')->where('id', '=', $id)->delete();

        if ($sql) {
            return redirect('/admin/cultivation');
        }
        else 
        {
            return "Something is wrong";
        }
    }
}
