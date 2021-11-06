<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Http\Requests\UserEditRequest;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $users = User::paginate(10);
        return view('perfil', compact('users'));
    }
    public function edit($id)
    {
        $user = User::find(Auth::user()->id);
        $roles = Role::all();
        return view('perfil', compact('user', 'roles'));
    }
    public function update(UserEditRequest $request, User $user)
    {
        // $user=User::findOrFail($id);
        $user = User::find(Auth::user()->id);
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

    public function profile()
    {
        return view('perfil', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request)
    {
        
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename2 = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/images/perfil/'.$filename2));
            
            $user = Auth::user();
            $user->avatar = $filename2;
            $user->save();
        }

        return redirect()->route('perfil', array('user' => Auth::user()))->with('success', 'Foto actualizada correctamente');
    }
}
