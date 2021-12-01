@extends('layouts.main', ['activePage' => 'profile', 'titlePage' => __('Perfil')])

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
                          <input type="submit" class="btn btn-outline-info" value="Cambiar">
                        </form>
                          <!-- <a href="#"class="btn btn-outline-primary">Cambiar imagen</a> -->
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
                      {{ Auth::user()->name }} 
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nombre de Usuario</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::user()->username }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ Auth::user()->email }} 
                    </div>
                  </div>
                  <hr>
                  @foreach($users as $user) <!--Recorremos el arreglo de usuario-->
                    @auth()
                      @if(Auth::user()->id == $user->id) <!---Si el id de usuario es igual al id del autenticado pueda editarlo--->
                      <div class="row">
                        <div class="col-sm-12">
                          <a class="btn btn-info " href="{{ route('users.edit', $user->id) }}">Editar Perfil</a>
                        </div>
                      </div>
                      @endif
                    @endauth
                  @endforeach
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
  </div>
</div>
<!--Estilo para plantilla usuario-->
<style type="text/css">
body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

</style>

<script type="text/javascript">

</script>
@endsection