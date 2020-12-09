<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vuelos;
class controllerVuelos extends Controller
{
    public function __construct (Vuelos $vuelo) {
        $this->vuelo = $vuelo;
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $vuelos = Vuelos::all();
        return response()->json(['vuelos'=> $vuelos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pais' => 'required|max:255',
            'ciudad' => 'required',
        ]);
        $vuelo = $this->vuelo->create($request->all());
            return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_vuelo=Vuelos::find($id);
        return ($id_vuelo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Vuelos::find($id)->update($request->all());
        return  $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vuelo = Vuelos::find($id);
        $vuelo->delete();
        return "El registro se elimino con existo";
    }
}
