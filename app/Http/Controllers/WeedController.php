<?php

namespace App\Http\Controllers;

use App\Weed;
use Illuminate\Http\Request;
use DB;
use Session;

class WeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'weed');
        $weeds = DB::select('SELECT * from weed');
        return view('backend/weed/index', [ 'weeds' => $weeds ]);
    }

    public function create()
    {
        Session::put('page', 'weed');
        return view('backend/weed/addWeed');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sql = DB::table('weed')->insert([
            ['cropName' => $request->cropName, 'weed_name' => $request->weed_name, 'weed_description' => $request->weed_description ]
        ]);
        if ($sql) {
            return redirect('/admin/weed')->with('added', 'Data Successfully submitted.');
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
        Session::put('page', 'weed');
        $sql = DB::table('weed')->where('id', '=', $id)->get();
        return view('backend/weed/updateWeed', [ 'sql' => $sql ]);
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
        $sql = DB::table('weed')->where('id', $id)->update(['cropName' => $request->cropName, 'weed_name' => $request->weed_name, 'weed_description' => $request->weed_description]);
        if($sql){
                return redirect('/admin/weed')->with('update', 'Data Successfully Update.');
        }else{

            return redirect()->back()->with('not_added', 'Something is wrong, Try Again.');
        }   
    }
}
