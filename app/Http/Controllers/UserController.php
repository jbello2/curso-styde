<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {

        /*  Comentado para usar el modelo Eloquent
        $users = DB::table('users')->get();  
        */

        $users = User::all();
        
        $title = 'Listado de usuarios';

        /*  Comentado para usar el de abajo
           return view('user.index')
                ->with('users', User::all())
                ->with('title', 'Listado de Usuarios');

        */

    	return view('user.index', compact('title', 'users'));
    	 
    }

    public function show(User $user) 
    {

      // $user = User::findOrFail($id);
      
      return view('user.show', compact('user'));

    }
    public function create() 
    {
        $operacion = "Crear un nuevo usuario";
        return view('user.create');
    }

    public function store()
    {

        $data = request()->all();

        // dd($data);
        if (empty($data['name'])) {
            return;
        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // return redirect()->route('user.index');
        // es igual a esta:
        return redirect('usuarios');
    }
}