@extends('layouts.main', ['activePage' => 'user-management', 'titlePage' => __('¡Videos mas votados!')])

@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                <div class="main">
        <h1>Pedido por la comunidad</h1>
        <ul class="cards">
            <li class="cards_item">
            <div class="card">
                <div class="card_image">
                <video controls>
                    <source src="{{ asset('/images/videos/save.mp4') }}" type="video/mp4">
                    <source src="mov_bbb.ogg" type="video/ogg">
                    Your browser does not support HTML video.
                </video></div>
                <div class="card_content">
                <h2 class="card_title">Blinding Lights (Official Video)</h2>
                <p class="card_text">The Weeknd </p>
                    <a href="{{ route('home') }}" class="btn card_btn" >Ir a Música</a>
                </div>
            </div>
            </li>
            <li class="cards_item">
            <div class="card">
                <div class="card_image">
                    <video controls>
                    <source src="{{ asset('/images/videos/sia.mp4') }}" type="video/mp4">
                    <source src="mov_bbb.ogg" type="video/ogg">
                    Your browser does not support HTML video.
                </video></div>
                <div class="card_content">
                <h2 class="card_title">Courage To Change (Offical Music Video)</h2>
                <p class="card_text">Sia </p>
                    <a href="{{ route('home') }}" class="btn card_btn" >Ir a Música</a>
                </div>
            </div>
            </li>
            <li class="cards_item">
            <div class="card">
                <div class="card_image"><video controls>
                    <source src="{{ asset('/images/videos/leave.mp4') }}" type="video/mp4">
                    <source src="mov_bbb.ogg" type="video/ogg">
                    Your browser does not support HTML video.
                </video></div>
                <div class="card_content">
                <h2 class="card_title"> Leave the Door Open</h2>
                <p class="card_text">Bruno Mars, Anderson .Paak, Silk Sonic</p>
                    <a href="{{ route('home') }}" class="btn card_btn" >Ir a Música</a>                                   
                </div>
            </div>
            </li>
            <li class="cards_item">
            <div class="card">
                <div class="card_image"><video controls>
                    <source src="{{ asset('/images/videos/levitating.mp4') }}" type="video/mp4">
                    <source src="mov_bbb.ogg" type="video/ogg">
                    Your browser does not support HTML video.
                </video></div>
                <div class="card_content">
                <h2 class="card_title">Levitating Featuring DaBaby</h2>
                <p class="card_text">Dua Lipa</p>
                    <a href="{{ route('home') }}" class="btn card_btn" >Ir a Música</a>                    
                </div>
            </div>
            </li>
            <li class="cards_item">
            <div class="card">
                <div class="card_image"><video controls>
                    <source src="{{ asset('/images/videos/yonaguni.mp4') }}" type="video/mp4">
                    <source src="mov_bbb.ogg" type="video/ogg">
                    Your browser does not support HTML video.
                </video></div>
                <div class="card_content">
                <h2 class="card_title">Yonaguni (Video Oficial)</h2>
                <p class="card_text">Bad Bunny</p>                
                    <a href="{{ route('home') }}" class="btn card_btn" >Ir a Música</a>                    
                </div>
            </div>
            </li>
            <li class="cards_item">
            <div class="card">
                <div class="card_image"><video controls>
                    <source src="{{ asset('/images/videos/quemas.mp4') }}" type="video/mp4">
                    <source src="mov_bbb.ogg" type="video/ogg">
                    Your browser does not support HTML video.
                </video></div>
                <div class="card_content">
                <h2 class="card_title">Qué más pues? (Official Video)</h2>
                <p class="card_text">J. Balvin, María Becerra</p>
                    <a href="{{ route('home') }}" class="btn card_btn" >Ir a Música</a>
                </div>
            </div>
            </li>
        </ul>
        </div>

        <h3 class="made_by">Videos de la semana</h3><div class="main">
        <h1>Proximamente...</h1>
        
        </div>
        </div>
        </div>
    </div>
</div>


<!--Estilo para plantilla usuario-->
<style type="text/css">


/* Font */
@import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');

/* Design */
*,
*::before,
*::after {
  box-sizing: border-box;
}

html {
  background-color: #ecf9ff;
}

body {
  color: #272727;
  font-family: 'Quicksand', serif;
  font-style: normal;
  font-weight: 400;
  letter-spacing: 0;
  padding: 1rem;
}

.main{
  max-width: 1200px;
  margin: 0 auto;
}

h1 {
    font-size: 24px;
    font-weight: 400;
    text-align: center;
}

img {
  height: auto;
  max-width: 100%;
  vertical-align: middle;
}
video {
  height: auto;
  max-width: 100%;
  vertical-align: middle;
}

.btn {
  color: #ffffff;
  padding: 0.8rem;
  font-size: 14px;
  text-transform: uppercase;
  border-radius: 4px;
  font-weight: 400;
  display: block;
  width: 100%;
  cursor: pointer;
  border: 1px solid rgba(255, 255, 255, 0.2);
  background: transparent;
}

.btn:hover {
  background-color: rgba(255, 255, 255, 0.12);
}

.cards {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
}

.cards_item {
  display: flex;
  padding: 1rem;
}

@media (min-width: 40rem) {
  .cards_item {
    width: 50%;
  }
}

@media (min-width: 100rem) {
  .cards_item {
    width: 33.3333%;
  }
}

.card {
  background-color: white;
  border-radius: 0.25rem;
  box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.card_content {
  padding: 1rem;
  background: linear-gradient(to bottom left, #EF8D9C 40%, #FFC39E 100%);
}

.card_title {
  color: #ffffff;
  font-size: 1.1rem;
  font-weight: 700;
  letter-spacing: 1px;
  text-transform: capitalize;
  margin: 0px;
}

.card_text {
  color: #ffffff;
  font-size: 1.500rem;
  line-height: 1.5;
  margin-bottom: 1.25rem;    
  font-weight: 400;
}
.made_by{
  font-weight: 400;
  font-size: 13px;
  margin-top: 35px;
  text-align: center;
}
</style>

<script type="text/javascript">

</script>
@endsection

