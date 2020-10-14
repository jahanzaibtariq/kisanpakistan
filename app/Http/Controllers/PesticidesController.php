<?php

namespace App\Http\Controllers;

use App\Pesticides;
use Illuminate\Http\Request;
use DB;
use Session;

class PesticidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'pest');
        $pesticides = DB::select('SELECT * from pesticides');
        return view('backend/pesticides/index', [ 'pesticides' => $pesticides ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Session::put('page', 'pest');
        return view('backend/pesticides/addPesticides');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sql = DB::table('pesticides')->insert([
            ['pestName' => $request->pestName,'pesticides' => $request->pesticides, 'controlMethod' => $request->controlMethod, 'cropName' => $request->cropName]
        ]);
        if ($sql) {
            return redirect('/admin/pesticides')->with('added', 'Data Successfully submitted.');
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
        Session::put('page', 'pest');
        $sql = DB::table('pesticides')->where('id', '=', $id)->get();
        return view('backend/pesticides/updatePesticides', [ 'sql' => $sql ]);
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

        $sql = DB::table('pesticides')->where('id', $id)->update(['pestName' => $request->pestName, 'pesticides' => $request->pesticides, 'controlMethod' => $request->controlMethod, 'cropName' => $request->cropName]);   
        if($sql){
                return redirect('/admin/pesticides')->with('update', 'Data Successfully Update.');
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
    // public function delete($id)
    // {
    //     $sql = DB::table('pesticides')->where('id', '=', $id)->delete();

    //     if ($sql) {
    //         return redirect('/admin/pesticides');
    //     }
    //     else 
    //     {
    //         return "Something is wrong";
    //     }
    // }
}
