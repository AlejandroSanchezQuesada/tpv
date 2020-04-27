<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
      //  $this->authorizeResource(User::class, 'user');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = json_decode($request->getContent(), true);

        return new UserResource(User::create($user));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update(json_decode($request->getContent(),true));
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            echo "Se ha borrado el Usuario con éxito";
        }
    }

    //Encontrar usuarios por nombre
    public function findbyNombre(Request $request){

        $users = DB::table('users')
                ->where('name', 'like', $request->name.'%')
                ->get();
        return $users;
    }

    //Encontrar usuarios por email
    public function findbyEmail(Request $request){

        $users = DB::table('users')
                ->where('email', 'like', '%'.$request->email.'%')
                ->get();
        return $users;
    }

    //Encontrar jefes
    public function isJefe(){

        $users = DB::table('users')
                ->where('jefe', '=', 1)
                ->get();
        return $users;
    }





}
