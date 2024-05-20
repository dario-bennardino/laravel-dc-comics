<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Functions\Helper;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Comic::all();
        //dd($products);
        return view('comics.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //VALIDAZIONE
        // leregole della validazione devono essere in relazione alla regole presenti nella migration
        //->validate() accetta due array come parametri. Il primo contiene le rules il secondo (opzionale) i messaggi custom di errore
        $request->validate([
            'title' =>  'required|min:3|max:120',
            'description' => 'nullable',
            'thumb' => 'nullable',
            'price' =>  'required|min:2|max:10',
            'series' =>  'nullable|min:3|max:60',
            'sale_date' =>  'required|date',
            'type' =>  'required|min:3|max:60',
            'artists' =>  'required',
            'writers' =>  'required',
        ], [
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.min' => 'Il titolo deve contenere almeno :min caratteri',
            'title.max' => 'Il titolo deve contenere non più di :max caratteri',
            'price.required' => 'Il prezzo è un campo obbligatorio',
            'price.min' => 'Il prezzo deve contenere almeno :min caratteri',
            'price.max' => 'Il prezzo deve contenere non più di :max caratteri',
            'series.min' => 'La serie deve contenere almeno :min caratteri',
            'series.max' => 'La serie deve contenere non più di :max caratteri',
            'sale_date.required' => 'La data di vendita è un campo obbligatorio',
            'sale_date.date' => 'La data deve essere formato date',
            'type.required' => 'Il tipo è un campo obbligatorio',
            'type.min' => 'Il tipo deve contenere almeno :min caratteri',
            'type.max' => 'Il tipo deve contenere non più di :max caratteri',
            'artists.required' => 'Artisti è un campo obbligatorio',
            'writers.required' => 'Scrittori è un campo obbligatorio',

        ]);


        //ricevo da create i dati del nuovo prodotto, li salvo nel DB e reindirizzo a show con l'id del nuovo prodotto


        //prendo tutti i dati provenienti dal form e li salvo in un'array associativo
        $form_data = $request->all();
        $new_comic = new Comic();
        //  ////////  ISTANZA SENZA FILLABLE  ///////////

        // $new_comic->title = $form_data['title'];
        // $new_comic->slug = Helper::generateSlug($new_comic->tile, new Comic());
        // $new_comic->description = $form_data['description'];
        // $new_comic->thumb = $form_data['thumb'];
        // $new_comic->price = $form_data['price'];
        // $new_comic->series = $form_data['series'];
        // $new_comic->sale_date = $form_data['sale_date'];
        // $new_comic->type = $form_data['type'];
        // $new_comic->artists = json_encode($form_data['artists']);
        // $new_comic->writers = json_encode($form_data['writers']);
        // dump($new_comic);
        // $new_comic->save();
        // dd($form_data);

        //  /////////  ISTANZA CON FILLABLE  //////////
        $form_data['slug'] = Helper::generateSlug($form_data['title'], new Comic());
        $new_comic->fill($form_data);
        //in form data non è presente lo slug e quindi lo devo aggiungere

        $new_comic->save();
        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        //$comic = Comic::find($id);
        // dd($comic);
        return view('Comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('Comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        /*
        1. valido i dati (TODO)
        2. salvo i dati nel form in $form_data
        3. genero lo slug se necessario
        4. aggiorno i dati nel DB
        5. redirect alla show

        */

        $form_data = $request->all();

        if ($form_data['title'] === $comic->title) {
            $form_data['slug'] = $comic->slug;
        } else {
            $form_data['slug'] = Helper::generateSlug($form_data['title'], new Comic());
        }

        //effettua il feel dei dati e li salva aggiornando il db
        $comic->update($form_data);
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        //elimino l'elemento e reindirizzo alla index con un messaggio in sessione dell'avvenuta eliminazione
        $comic->delete();

        // ->with('chiave variabile di sessione, 'valore variabile di sessione')
        return redirect()->route('comics.index')->with('deleted', 'Il Comic' . $comic->title . 'è stato eliminato correttamente');
    }
}
