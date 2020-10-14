<?php

namespace App\Http\Controllers;

use App\Disease;
use Illuminate\Http\Request;
use DB;
use Session;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'disease');
        $diseases = DB::select('SELECT * from disease');
        return view('backend/disease/index', [ 'diseases' => $diseases ]);
    }

    public function create()
    {
        Session::put('page', 'disease');
        return view('backend/disease/addDisease');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sql = DB::table('disease')->insert([
            ['cropName' => $request->cropName, 'diseaseName' => $request->diseaseName, 'cureMethod' => $request->cureMethod, 'preventionMethod' => $request->preventionMethod ]
        ]);
        if ($sql) {
            return redirect('/admin/disease')->with('added', 'Data Successfully submitted.');
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
        Session::put('page', 'disease');
        $sql = DB::table('disease')->where('disease_id', '=', $id)->get();
        return view('backend/disease/updateDisease', [ 'sql' => $sql ]);
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
        $sql = DB::table('disease')->where('disease_id', $id)->update(['diseaseName' => $request->diseaseName, 'cureMethod' => $request->cureMethod, 'preventionMethod' => $request->preventionMethod, 'cropName' => $request->cropName]);   
        return redirect('/admin/disease');
        if($sql){
                return redirect('/admin/disease')->with('update', 'Data Successfully Update.');
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
        $sql = DB::table('disease')->where('id', '=', $id)->delete();

        if ($sql) {
            return redirect('/admin/disease');
        }
        else 
        {
            return "Something is wrong";
        }
    }
}
