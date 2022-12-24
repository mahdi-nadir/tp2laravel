<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;

class CouleurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->couleur = str_replace('#', '', $request->couleur);

        $request->validate([
            "couleur" => "required"
        ]);

        Couleur::create(['codeHexa' => $request->couleur, 'image_id' => $id]);

        return redirect()->route('editImage', $id)->with('success', 'Couleur ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Couleur  $couleur
     * @return \Illuminate\Http\Response
     */
    public function show(Couleur $couleur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Couleur  $couleur
     * @return \Illuminate\Http\Response
     */
    public function edit(Couleur $couleur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Couleur  $couleur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Couleur $couleur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Couleur  $couleur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Couleur $couleur)
    {
        //
    }
}
