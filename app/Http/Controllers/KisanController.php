<?php

namespace App\Http\Controllers;

use App\Kisan;
use Illuminate\Http\Request;
use DB;

class KisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsSql = DB::select('SELECT * from news');
        if ($newsSql) 
        {
          return view('backend/kisan/index', [ 'newsSql' => $newsSql ]);
        }
    }

    public function create()
    {
        return view('backend/kisan/addNews');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sql = DB::table('news')->insert([
            ['newsName' => $request->newsName, 'newDescription' => $request->newDescription ]
        ]);

        if ($sql) {
            return redirect('/admin/kisan');
        }
        else
        {
            return "Something is Wrong";
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
    public function edit(Fertilizer $fertilizer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fertilizer  $fertilizer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fertilizer $fertilizer)
    {
        //
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
        $sql = DB::table('news')->where('id', '=', $id)->delete();

        if ($sql) {
            return redirect('/admin/kisan');
        }
        else 
        {
            return "Something is wrong";
        }
    }
}
