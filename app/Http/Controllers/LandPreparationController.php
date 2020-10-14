<?php

namespace App\Http\Controllers;

use App\LandPreparation;
use Illuminate\Http\Request;
use DB;
use Session;

class LandPreparationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'land');
        $lands = DB::select('SELECT * from landpreparation');
        return view('backend/land/index', [ 'lands' => $lands ]);
    }

    public function create()
    {
        Session::put('page', 'land');
        return view('backend/land/addLand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sql = DB::table('landpreparation')->insert([
            ['cropName' => $request->cropName, 'landPreparation' => $request->landPreparation]
        ]);
        if ($sql) {
            return redirect('/admin/land/preparation')->with('added', 'Data Successfully submitted.');
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
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fertilizer  $fertilizer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Session::put('page', 'land');
        $sql = DB::table('landpreparation')->where('id', '=', $id)->get();
        return view('backend/land/updateLand', [ 'sql' => $sql ]);
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
        $sql = DB::table('landpreparation')->where('id', $id)->update(['landPreparation' => $request->landPreparation, 'cropName' => $request->cropName]);   
        if($sql){
                return redirect('/admin/land/preparation')->with('update', 'Data Successfully Update.');
        }else{

            return redirect()->back()->with('not_added', 'Something is wrong, Try Again.');
        }
     
    }
    public function delete($id)
    {
        $sql = DB::table('landpreparation')->where('id', '=', $id)->delete();

        if ($sql) {
            return redirect('/admin/land/preparation');
        }
        else 
        {
            return "Something is wrong";
        }
    }
}
