<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X MUSIC</title>

    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap"  crossorigin="crossorigin" as="font">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/styles.css">

    <style>
         /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
    </style>

</head>
<body>
    <ul>
        @if (Route::has('login'))
            @auth
                <li style="float:right"><a href="{{ url('/home') }}">Perfil</a></li>
            @else
                <li style="float:right"><a href="{{ route('login') }}">LOG IN </a></li>
            @if (Route::has('register'))
                <li style="float:right"><a href="{{ route('register') }}">REGISTER</a></li>
            @endif
        @endauth
        @endif
        <li>
            <a href="#seccion1" class="navegacion__enlace enlace">Visi??n</a>
        </li>
        <li>
            <a href="#seccion2" class="navegacion__enlace enlace">Creadores</a>
        </li>
    </ul>

    <header class="header">
        <div class="contenedor">
            <div class="barra">
                <a class="Logo" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo14.png')}}" alt="Logo" width="150">
                </a>

                <nav class="navegacion">
                    
                </nav>
            </div>
        </div>

        <div class="header__texto">
            <p><h1 class="no-margin">El Mejor Sitio de M??sica</h1></p>
            <h1>Escucha a tu cantante favorito y descarga la canci??n</h1>
        </div>
       
    </header>

    <h2>Visi??n</h2>
    <section class="Partes" id="seccion1">
        
        <div class="Division">
            <img src="{{ asset('img/login_1.jpg')}}" alt="">
            <p>
            <br>
            Somos una plataforma de m??sica cuya finalidad es hacer que las personas dispongan de la mejor 
			m??sica del momento desde cualquier lugar donde est??n, les brindamos herramientas y formas 
			de seleccionar y organizar la m??sica que las personas deseen, por esto mismo nos definimos 
			como una pagina de m??sica individual, la cual con la ayuda de 
			los usuarios se hace una comunidad dedicada a la misma comunidad y a seguir creciendo.
            </p>
        </div>
    </section>

    <h2>Elaborado por:</h2>
    <section class="Partes" id="seccion2">
        
        <div class="Division" >
            <p>
            <br>
            CENTRO UNIVERSITARIO DE CIENCIAS EXACTAS E INGENIER??AS <br>
            Ch??vez Salado Francisco Javier <br>
            Encinas Mardue??o Catherine Michelle <br>
            Moreno Esparza Paola Janeth <br>
            Nu??ez Alavarado Bryan Daniel <br>
            Ram??rez Rojas Judith Samara  <br>
            V??zquez Rodr??guez Luis Eduardo <br>
            Flores Luquin Pedro
            </p>
            <img src="{{ asset('img/login_2.jpg')}}" alt="">
        </div>  
    </section>
    <br>
    <footer>
    <p>&copy 2021 X MUSIC. Todos los Derechos Reservados | Dise??o por <a href="#" target="_blank">Los del X</a></p>			
    </footer>
</body>
</html>