@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Editar usuario'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('users.update', $user->id) }}" method="post" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Usuario</h4>
              <p class="card-category">Editar datos</p>
            </div>
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autofocus>
                  @if ($errors->has('name'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="username" class="col-sm-2 col-form-label">Nombre de usuario</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}">
                  @if ($errors->has('username'))
                    <span class="error text-danger" for="input-username">{{ $errors->first('username') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-7">
                  <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                  @if ($errors->has('email'))
                    <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control" name="password" placeholder="Ingrese la contraseña sólo en caso de modificarla">
                  @if ($errors->has('password'))
                    <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                  @endif
                </div>
              </div>
              <!--Asignar roles al usuario -->
              <div class="row">
                <label for="role" class="col-sm-2 col-form-label">Asignar rol</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <div class="tab-content">
                      <div class="tab-pane active">
                        <table class="table">
                          <tbody>
                              <select name="role" class="form-control">
                                <option value="2" selected disabled>Selecciona un rol</option>
                                  @foreach ($roles as $role)
                                    @if($role->name == str_replace(array('["','"]'), '', $user->tieneRol()))
                                        <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                    
                                    @else
                                        @can('users.create')
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endcan
                                    @endif
                                @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </select>
              </div>
            </div>
            <!--Boton-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            <!--End botón-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection