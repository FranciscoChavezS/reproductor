@extends('layouts.main', ['activePage' => 'posts', 'titlePage' => 'Detalles del post'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <!-- Mostrar mensaje en post-->
          @if (session('mensajePost'))
                    <div class="alert alert-success" role="success">
                      {{ session('mensajePost') }}
                    </div>
            @endif
        <div class="card">
          <!--Cabecera o Header-->
          <div class="card-header card-header-primary">
            <h4 class="card-title">Canción</h4>
            <p class="card-category">Vista detallada de {{ $post->title }}</p>
          </div>
          <!--Fin de Header-->
          <!--Body-->
          <div class="card-body">
            <div class="row">
              <!-- Primero -->
              <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">
                          <img src="{{ asset($post->foto)}}" alt="" width="150" class="img-fluid img-thumbnail">
                          <h5 class="title mt-3">{{ $post->title }}</h5>
                        </a>
                        <p class="description">
                          <!-- 
                          {{ $post->title }} <br>
                          {{ $post->foto }} <br> -->
                          Fecha: {{ $post->fecha }} <br>
                          Genero: {{ $post->genero }} <br>
                          Artista: {{ $post->artista }} <br>
                          Creación de post: {{ $post->created_at }}
                        <audio controls style="width: 250px;">
                          <source src="{{ asset($post->cancion)}}" type="audio/mp3">
                        </audio>
                    
                        </p>
                      </div>
                    </p>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                      <a href="{{ route('posts.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Editar</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--Fin de primero-->
            </div>
            <!--fin de fila-->
          </div>
          <!--fin de body-->
        </div>
        <!--fin de card-->
      </div>
    </div>
  </div>
</div>
@endsection