@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('¡Recomendado para ti!')])

@section('content')
<div class="content">
      <div class="col-md-12">
      <div class="container-fluid">
         <!-- Mostrar mensaje en post-->
      @if (session('successPlaylist'))
                    <div class="alert alert-success" role="success">
                      {{ session('successPlaylist') }}
                    </div>
            @endif
        <div class="row">
    @foreach($posts as $post)
          <div class="col-md-4 col-12 justify-content-center mb-5">
            <div class="card m-auto" style="width: 18rem;">
                <img src="{{ asset($post->foto)}}" class="card-img-top" alt="">
                <div class="card-body">
                  <small class="card-txt-category">Fecha: {{ $post->fecha }}</small>
                  <h3 class="card-title my-2">{{ $post->title }}</h3>
                  <h5 class="card-title my-2">Genero: {{ $post->genero }}</h5>
                  <a href="{{ route('posts.index', $post->id) }}" class="post-link"><b>Artista: {{ $post->artista }}</b></a>
                  <hr>
                  <div class="d-card-text">
                  <audio controls style="width: 250px;">
                        <source src="{{ asset($post->cancion)}}" type="audio/mp3">
                  </audio>
                </div>
                  <hr>
                  <div class="row">
                    <div class="col-6 text-right">
                      <div class="card-footer ml-auto mr-auto">
                      <form method="POST" action="{{ route('playlist.addToCart', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                          <input type="hidden" name="title"  value="{{ old('title', $post->title) ?? ''}}">
                          <input type="hidden" name="fecha" value="{{ old('fecha', $post->fecha) ?? ''}}">
                          <input type="hidden" name="genero"  value="{{ old('genero', $post->genero) ?? ''}}">
                          <input type="hidden" name="artista"  value="{{ old('artista', $post->artista) ?? ''}}">
                        <button type="submit" class="btn btn-outline-success">Agregar Playlist</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
      @endforeach
        </div>
    </div>
  </div>
</div>
@endsection
