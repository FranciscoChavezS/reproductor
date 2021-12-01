<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\PlaylistController;


class PlaylistController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['user'])->paginate(5);
        return view('playlist', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playlist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Método para agregar registros
        $post = new Post();
        
        $post->user_id = auth()->user()->id;

        $post->title = $request->title;
        $post->fecha = $request->fecha;
        $post->genero = $request->genero;
        $post->artista = $request->artista;
        //$post->cancion = $request->cancion;

       //Guardar ruta de canción a la BD
       if($request->hasFile('cancion')){
        $file1 = $request->file('cancion');
        $destinationPath1 = 'images/media/'; //asignamos la carpeta 
        $filename1 = time().'-'.$file1->getClientOriginalName(); //recuperar el nombre original del archivo
        $uploadSuccess = $request->file('cancion')->move($destinationPath1, $filename1); //la canción cargada la movemos a la carpeta y guardamos la url en la DB
        $post->cancion = $destinationPath1 . $filename1;
        }

        //Guardar ruta de imagen en BD 
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $destinationPath = 'images/featureds/'; //asignamos la carpeta 
            $filename = time().'-'.$file->getClientOriginalName(); //recuperar el nombre original del archivo
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename); //la imagen cargada la movemos a la carpeta y guardamos la url en la DB
            $post->foto = $destinationPath . $filename;
         }
        
         $post->save();
        //Post::create($request->all());

        return redirect()->route('playlist')->with('mensajePost','Registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        return view('playlist', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //Agregar policies que solo se puedan editar los posts que de tu propiedad y no los de otros usuarios
        $this->authorize('author', $post);

        return view('playlist', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, Post $post)
    {
        //$post->update($request->all());
        //$post = Post::find($id);

        //Agregar Policy
        $this->authorize('author', $post);
        
        $post->title = $request->title;
        $post->fecha = $request->fecha;
        $post->genero = $request->genero;
        $post->artista = $request->artista;
        //$post->cancion = $request->cancion;

        //Actualizar canción en BD 
        if($request->hasFile('cancion')){
            $file1 = $request->file('cancion');
            $destinationPath1 = 'images/media/'; //asignamos la carpeta 
            $filename1 = time().'-'.$file1->getClientOriginalName(); //recuperar el nombre original del archivo
            $uploadSuccess = $request->file('cancion')->move($destinationPath1, $filename1); //la canción cargada la movemos a la carpeta y guardamos la url en la DB
            $post->cancion = $destinationPath1 . $filename1;
        }
        
        //Actualizar foto
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $destinationPath = 'images/featureds/'; //ubicamos la carpeta a guardar las imagenes
            $filename = time().'-'.$file->getClientOriginalName(); 
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename); 
            $post->foto = $destinationPath . $filename; //concatenamos el destino con el nombre del archivo
         }

        $post->save();

        return redirect()->route('playlist.index')->with('mensajePost','Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        /*Agregar policies para que solo se puedan eliminar los post que de tu propiedad 
        o con el permiso necesario*/
        $this->authorize('author', $post);
        
        $post->delete();

        return redirect()->route('playlist')->with('mensajePost','Registro eliminado correctamente');
    }

    public function cart(){

        $post = Post::paginate(10);
        return view('cart', compact('posts'));
    }


    public function addToCart($id){

        $post = Post::find($id);
        $cart = session()->get('cart');

        //Si el carrito está vacío, este es el primer producto
        if(!$cart){

            $cart = [
                $id =>[
                    "title" => $post->title,
                    "foto" => $post->foto,
                    "fecha" => $post->fecha,
                    "genero" => $post->genero,
                    "artista" => $post->artista,
                    "quantity" => 1,
                    "cancion" => $post->cancion,
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('successPlaylist', 'Cancion agregada correctamente');       
        }
        //Si el carrito no está vacío, verifica si este producto existe y luego incremente la cantidad.
        if(isset($cart[$id])){

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('successPlaylist','Cancion agregada correctamente');
        }
        $cart[$id] = [
            "title" => $post->title,
            "foto" => $post->foto,
            "fecha" => $post->fecha,
            "genero" => $post->genero,
            "artista" => $post->artista,
            "quantity" => 1,
            "cancion" => $post->cancion,
        ];
        
        session()->put('cart', $cart);
        return redirect()->back()->with('successPlaylist', 'Cancion agregada correctamente');       

    }
    
}
