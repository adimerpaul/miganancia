<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
//        $request->validate([
////            'email'=>'required|unique:users|email',
////            'carnet'=>'required|unique:users',
//        ]);
        $user=new User();
        $user->name= strtoupper( $request->name);
        $user->email=$request->email;
        $user->password=Hash::make( $request->password);
//        $user->carnet=$request->carnet;
//        $user->unit_id=$request->unit_id;
        $user->fechalimite=date('Y-m-d', strtotime(now(). ' + 360 days'));;
        $user->save();

        $negocio=new Negocio();
        $negocio->foto=$request->foto;
        $negocio->tipo=$request->tipo;
        $negocio->nombre=$request->nombre;
        $negocio->direccion=$request->direccion;
        $negocio->ciudad=$request->ciudad;
        $negocio->user_id=$request->user_id;
        $negocio->save();
//        $permiso = Permiso::find([3]);
//        $user->permisos()->attach($permiso);
        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'token'=>$token,
            'user'=>User::where('id',$user->id)
//                ->with('permisos')
//                ->with('unit')
                ->firstOrFail()
        ],200);;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
