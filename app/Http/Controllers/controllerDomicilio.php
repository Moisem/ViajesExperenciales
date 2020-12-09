<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domicilio;
class controllerDomicilio extends Controller
{
    public function __construct (Domicilio $domicilio) {
        $this->domicilio = $domicilio;
        //$this->middleware('auth');
 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function page(){
        return view('domicilio.index');
    }

    public function index()
    {
        $domicilios = Domicilio::all();
        return response()->json(['domicilios'=> $domicilios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $domicilio = $this->domicilio->create($request->all());
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
        $id_domi=Domicilio::find($id);
        return ($id_domi);
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
        Domicilio::find($id)->update($request->all());
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
        $domicilio = Domicilio::find($id);
        $domicilio->delete();
        return "El registro se elimino con existo";
    }
}
