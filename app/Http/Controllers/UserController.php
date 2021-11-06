<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    //proteger rutas con middleware por medio del cosntructor
    public function __construct()
    {
        $this->middleware('can:users.index')->only('index'); //especificamos la ruta para para los permisos que tiene
        $this->middleware('can:users.create')->only('create', 'store');
         
        $this->middleware('can:users.destroy')->only('destroy');//solo los autorizados con este permiso podran acceder a estas vistas

    }
    public function index()
    {
        $users = User::paginate(5); //Cada 5 registros de usuarios se cambia de página
        return view('users.index', compact('users'));
    }

    public function create()
    {
    
        return view('users.create');
    }

    public function store(UserCreateRequest $request)
    {
        
        //Validación de usuario 
        // $request->validate([
        //     'name' => 'required|min:3|max:5',
        //     'username' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required'
        // ]);
        $user = User::create($request->only('name', 'username', 'email')
            + [
                'password' => bcrypt($request->input('password')),
            ]);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario creado correctamente');
    }

    public function show(User $user)
    {
        // $user = User::findOrFail($id);
        // dd($user);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UserEditRequest $request, User $user)
    {
        // $user=User::findOrFail($id);
        $data = $request->only('name', 'username', 'email');
        $password=$request->input('password');
        if($password)
            $data['password'] = bcrypt($password);
        // if(trim($request->password)=='')
        // {
        //     $data=$request->except('password');
        // }
        // else{
        //     $data=$request->all();
        //     $data['password']=bcrypt($request->password);
        // }
        
        //$user->roles()->sync($request->roles);
        $role =  $user->roles;
        
        if(count($role) > 0){
            $role_id = $role[0]->id;
            User::find($user->id)->roles()->updateExistingPivot($role_id,['role_id' => $request->get('role')]);
        }else{
            $user->assignRole($request->get('role'));
        }
        
        $user->update($data);
        return redirect()->route('perfil', $user->id)->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('succes', 'Usuario eliminado correctamente');
    }

    public function profile()
    {
        return view('perfil', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request)
    {
        $user = new User();
        //Guardar ruta de foto de perfil a la BD
       if($request->hasFile('avatar')){
        $file2 = $request->file('avatar');
        $destinationPath2 = 'images/perfil/'; //asignamos la carpeta 
        $filename2 = time().'-'.$file2->getClientOriginalName(); //recuperar el nombre original del archivo
        $uploadSuccess = $request->file('avatar')->move($destinationPath2, $filename2); //la imagen cargada la movemos a la carpeta y guardamos la url en la DB
        $user->avatar = $destinationPath2 . $filename2;
        }

        $user->save();

        return redirect()->route('perfil', $user->id)->with('success', 'Imagen actualizada correctamente');

    }
}
