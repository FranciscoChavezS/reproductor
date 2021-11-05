@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Nuevo Post'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('posts.store') }}" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">MÚSICA</h4>
              <p class="card-category">Resgistrar canción</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="title" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="title" placeholder="Ingrese el nombre de la canción"
                    autocomplete="off" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('title'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('title') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control" name="foto"
                    autocomplete="off" accept="image/*"> <!--Validamos que solo acepte archivos tipo imagen png,jpg,jpeg,etc-->
                    <!--Validaciones-->
                    @if($errors->has('foto'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('foto') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-7">
                  <input type="date" name="fecha" id="fecha" class="form-control">
                  <!--Validaciones-->
                  @if($errors->has('fecha'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('fecha') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="genero" class="col-sm-2 col-form-label">Género</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="genero" placeholder="Ingrese el genero"
                    autocomplete="off" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('genero'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('genero') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="artista" class="col-sm-2 col-form-label">Artista</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="artista" placeholder="Ingrese la artista"
                    autocomplete="off" autofocus>
                    <!--Validaciones-->
                    @if($errors->has('artista'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('artista') }}</span>
                    @endif
                </div>
              </div>
              <div class="row">
                <label for="cancion" class="col-sm-2 col-form-label">Canción</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control" name="cancion"
                    autocomplete="off" accept=".mp3"> <!--Validamos que solo acepte archivos tipo mp3 -->
                    <!--Validaciones-->
                    @if($errors->has('cancion'))
                      <span class="error text-danger" for="input-name">{{ $errors->first('cancion') }}</span>
                    @endif
                </div>
              </div>
              
            </div>

            <!--End body-->

            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection