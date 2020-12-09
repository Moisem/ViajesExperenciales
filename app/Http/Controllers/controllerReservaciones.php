<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservaciones;
class controllerReservaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct (Reservaciones $reservacion) {
        $this->reservacion = $reservacion;
 
    }
    public function page() {
        return view('reservaciones.index');
    }
    public function index()
    {
        $reservaciones = Reservaciones::all();
        return response()->json(['reservaciones'=> $reservaciones]);
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
        $reservacion = $this->reservacion->create($request->all());
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
        $id_reser=Reservaciones::find($id);
        return ($id_reser);
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
        Reservaciones::find($id)->update($request->all());
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
        $reservacion = Reservaciones::find($id);
        $reservacion->delete();
        return "El registro se elimino con existo";
    }
}
