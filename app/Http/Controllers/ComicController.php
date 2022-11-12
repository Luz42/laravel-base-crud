<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // visualizzazione dei dati tramite file
        //$comics = config('data.comics');
        //dd($comics);
     
        // visualizzazione dei dati tramite database
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //riporta ad una view contenente il form da compilare che successivamente verra gestito dalla route STORE
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // la variabile request estrapola tutti i valori del form presenti in CREATE
        // con il metodo all() si accede ai valori
        $data = $request->all();

        //viene creata una nuova istanza del modello
        $newComic =  new Comic();
    
        //vengono associati i valori dell'istanza generata con quelli ricevuti dal form
        /*
        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->thumb = $data['thumb'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->type = $data['type'];
        */

        //i valori dichiarati nel MODELLO da associare, vengono abbinati tramite la funzione fill() con i dati ricevuti dal FORM
        $newComic->fill($data);


        //la nuova istanza viene salvata
        $newComic->save();

        //si reindirizza la visualizzazione perchè la rotta con metodo POST serve per salvare i dati e non per leggerli
        return redirect()->route('comics.show', $newComic->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        //
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        //
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        //elimina l'elemento che viene inviato in questa rotta
        $comic->delete();

        //reindirizza nella pagina principale
        return redirect()->route('comics.index');
    }
}
