<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionEditRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //proteger rutas con middleware por medio del cosntructor
    public function __construct()
    {
        $this->middleware('can:permissions.index')->only('index'); //especificamos la ruta para para los permisos que tiene
        $this->middleware('can:permissions.create')->only('create', 'store');
        $this->middleware('can:permissions.edit')->only('edit', 'update', 'show'); //solo los autorizados con este permiso podran acceder a estas vistas
        $this->middleware('can:permissions.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(10);

        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionCreateRequest $request)
    {
        Permission::create($request->only('name'));

        return redirect()->route('permissions.index')->with('mensajePermiso', 'Permiso creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionEditRequest $request, Permission $permission)
    {
        $permission->update($request->only('name'));

        return redirect()->route('permissions.index')->with('mensajePermiso', 'Permiso actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')->with('mensajePermiso', 'Permiso eliminado correctamente');
    }
}
