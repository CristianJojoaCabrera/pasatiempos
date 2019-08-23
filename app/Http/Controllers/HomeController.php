<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\UserHobby;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);

        return view('home');
    }

    public function register_user (Request $request)
    {

        $user = new User();
        $user->name = $request->get('name');
        $user->user_name = $request->get('name_user');
        $user->password = Hash::make($request->get('password'));
        $user->email = $request->get('email');
        $user->city = $request->get('city');
        $user->save();
        $user->roles()->attach(Role::where('name', 'USER')->first());

        return new JsonResponse('registro exitoso',200);

    }

    public function usuarios_tbl ()
    {
        $user = User::whereHas('rol',function($query){
            $query->where('role_id',2);
        })->get();

        return DataTables::of($user)
            ->addColumn('Accion', function () {
                return '
                        <button class="btn btn-primary btn-sm pasatiempo"><i class="fa fa-bars"></i></button>
                        <button class="btn btn-success btn-sm editar" data-toggle="modal" data-target="#editarModal"><i class="fa fa-edit"></i></button>
                        ';
            })
            ->rawColumns(['Accion'])
            ->make(true);
    }

    public function edit_user (Request $request)
    {
        $user = User::find($request->get('id'));
        $user->name = $request->get('name');
        $user->user_name = $request->get('name_user');
        $user->email = $request->get('email');
        $user->city = $request->get('city');
        $user->save();

        return new JsonResponse('edicción exitosa',200);
    }

    public function register_hobby (Request $request)
    {
        $userHobby = new UserHobby();
        $userHobby->user_id = Auth::user()->id;
        $userHobby->name = $request->get('name');
        $userHobby->save();

        return new JsonResponse('registro exitoso',200);
    }

    public function usuarios_hobbies_tbl ($userId)
    {
        $user = User::has('hobby')->where('id',$userId)->first();
        return DataTables::of($user->hobby)
            ->addIndexColumn()
            ->addColumn('name', function ($hobby) {
                return $hobby->name;
            })
            ->addColumn('Accion', function () {
                return '
                        <button class="btn btn-success btn-sm editar" data-toggle="modal" data-target="#editarModal"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm eliminar" ><i class="fa fa-trash-o"></i></button>
                        ';
            })
            ->rawColumns(['Accion'])

            ->make(true);
    }

    public function edit_user_hobby (Request $request)
    {
        $userHobby = UserHobby::find($request->get('id'));
        $userHobby->name = $request->get('name');
        $userHobby->save();

        return new JsonResponse('edicción exitosa',200);
    }

    public function delete_user_hobby(Request $request)
    {
        $user = UserHobby::find($request->get('id'));
        $user->delete();
        return new JsonResponse('Elminado exitoso',200);
    }

}
