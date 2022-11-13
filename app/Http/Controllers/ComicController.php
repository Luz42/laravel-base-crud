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
        //con il metodo validate(), i valori ricevuti dal form, in $request vengono verificati
        $request->validate([
            "title"=>'required|max:50',
            "description"=>'required',
            "thumb"=>'required|url',
            "price"=>'required|numeric|between:0,9999.99',
            "series"=>'required|max:50',
            "sale_date"=>'required|date',
            "type"=>'required|max:20'
        ],[
            //è possibile customizzare nel dettaglio, il messaggio
            // 'title.required'=>'Il titolo è obbligatorio',
            // è possibile utilizzare :attribute & :key
            
            'required'=>':attribute è obbligatorio',
            'max'=> ':attribute non può avere più di :max caratteri',
            'url'=> 'Inserire un formato corretto',
            'date'=> 'Inserire una data',
            'numeric'=> ':attribute deve essere un numero',
            'between'=> ':attribute deve essere compreso tra :min e :max'


        ]);

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
        // la variabile request estrapola tutti i valori del form presenti in EDIT
        // con il metodo all() si accede ai valori
        $data = $request->all();

        //con il metodo update(), viene aggiornato l'elemento con i valori ricevuti dal form
        $comic->update($data);

        //reindirizzato nell'elemento modificato
        return redirect()->route('comics.show', $comic->id);
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
