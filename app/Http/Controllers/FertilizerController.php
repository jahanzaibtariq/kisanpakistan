<?php

namespace App\Http\Controllers;

use App\Fertilizer;
use Illuminate\Http\Request;
use DB;
use Session;

class FertilizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'fertilizer');
        $fertilizer = DB::select('SELECT * from fertilizer');
        return view('backend/fertilizer/index', [ 'fertilizer' => $fertilizer ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Session::put('page', 'fertilizer');
        return view('backend/fertilizer/addFertilizer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sql = DB::table('fertilizer')->insert([
            ['cropName' => $request->cropName, 'fertilizerUsage' => $request->fertilizerUsage]
        ]);
        if ($sql) {
            return redirect('/admin/fertilizer')->with('added', 'Data Successfully submitted.');
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
        Session::put('page', 'fertilizer');
        $sql = DB::table('fertilizer')->where('id', '=', $id)->get();
        return view('backend/fertilizer/updateFertilizer', [ 'sql' => $sql ]);
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
        $sql = DB::table('fertilizer')->where('id', $id)->update(['fertilizerUsage' => $request->fertilizerUsage,'cropName' => $request->cropName]);   
        if($sql){
                return redirect('/admin/fertilizer')->with('update', 'Data Successfully Update.');
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
        $sql = DB::table('fertilizer')->where('id', '=', $id)->delete();

        if ($sql) {
            return redirect('/admin/fertilizer');
        }
        else 
        {
            return redirect()->back();
        }
    }
}
