<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
class controllerUsuarios extends Controller
{
    public function __construct (Users $usuario) {
        $this->usuario = $usuario;
<<<<<<< HEAD
        //$this->middleware('auth');
=======
>>>>>>> bfead176ad2842b7104f3658e48e3a53c580301c
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    //public function page(){
       // return view('usuarios.index');
    //}
=======
    /*
    public function page(){
        return view('usuarios.index');
    }
    */
>>>>>>> bfead176ad2842b7104f3658e48e3a53c580301c
    public function index()
    {
        $usuarios = Users::all();
        return response()->json(['usuarios'=> $usuarios]);
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
        $usuario = new Usuarios;
        $usuario->create($request->all());
        return response()->json($usuario);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_us=Usuarios::find($id);
        return ($id_us);
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
        Users::find($id)->update($request->all());
        return ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios = Users::find($id);
        $usuarios->delete();
    }
}
