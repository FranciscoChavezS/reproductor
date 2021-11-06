@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Detalles del usuario'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
       <!-- Mostrar mensaje en user-->
       @if (session('success'))
                    <div class="alert alert-success" role="success">
                      {{ session('success') }}
                    </div>
            @endif
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="card-title">Perfil de Usuario</div>
            <p class="card-category">Vista detallada del usuario {{ Auth::user()->name }} </p>
          </div>
        <!-- Mostrar usuario-->
        <div class="container">
        <div class="main-body">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="/images/perfil/{{ Auth::user()->avatar}}" alt="Admin" class="rounded-circle" width="150">
                        <form action="{{ route('perfil') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <label>Actualizar foto</label>
                            <input type="file" name="avatar" class="card-img-top">
                          <div class="mt-3">
                          <input type="submit" class="btn btn-primary" value="Cambiar">
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
              
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nombre Completo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nombre de Usuario</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->username }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->email }}
                    </div>
                  </div>
                  <hr>
                      <div class="row">
                        <div class="col-sm-12">
                          <a class="btn btn-info " href="{{ route('users.edit', $user->id) }}">Editar Perfil</a>
                        </div>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection