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
        $new_comic->fill($form_data);
        //in form data non è presente lo slug e quindi lo devo aggiungere
        $form_data['slug'] = Helper::generateSlug($form_data['title'], new Comic());
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
