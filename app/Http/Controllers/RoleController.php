<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleEditRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    //proteger rutas con middleware por medio del cosntructor
   /*  public function __construct()
    {
        $this->middleware('can:roles.index')->only('index'); //especificamos la ruta para para los permisos que tiene
        $this->middleware('can:roles.create')->only('create', 'store');
        $this->middleware('can:roles.edit')->only('edit', 'update', 'show'); //solo los autorizados con este permiso podran acceder a estas vistas
        $this->middleware('can:roles.destroy')->only('destroy');
    } */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(10);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all()->pluck('name', 'id');
        // dd($permissions);
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        $role = Role::create($request->only('name'));

        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role->load('permissions');
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all()->pluck('name', 'id');
        $role->load('permissions');
        // dd($role);
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleEditRequest $request, Role $role)
    {
        $role->update($request->only('name'));

        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index');
    }
}