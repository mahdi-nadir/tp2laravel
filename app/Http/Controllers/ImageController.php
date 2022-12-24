<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Visite;
use App\Models\Couleur;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return view('allimages', [
            'images' => Image::all(),
            'lesCollections' => Collection::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lesCollections = Collection::all();
        return view('createImage')->with('lesCollections', $lesCollections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "url" => ["required", "regex:/^(dummyimage.com)$/i"],
            "width" => "required|numeric",
            "height" => "required|numeric",
            "slug" => ["required", "regex:/^[a-zA-Z0-9]{6}$/i"],
        ]);

        $image = Image::create($request->only('url', 'width', 'height', 'slug', 'collection_id'));

        for ($i = 0; $i < count($request->codeHexa); $i++) {
            $realCodeHexa = str_replace('#', '', $request->codeHexa[$i]);
            Couleur::create([
                'codeHexa' => $realCodeHexa,
                'image_id' => $image->id,
            ]);
        }

        return redirect()
            ->route('toutesImages')
            ->with('success', 'Image créée avec succès.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slugImage)
    {
        $image = Image::where('slug', $slugImage)->first();

        Visite::create([
            'date' => now(),
            'useragent' => $request->userAgent(),
            'image_id' => $image->id,
        ]);

        $couleurs = Couleur::where('image_id', $image->id)->get();

        return view('uneImage')->with('image', $image)
            ->with('couleurs', $couleurs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image, $id)
    {
        return view('editImage', [
            'image' => Image::findOrFail($id),
            'lesCollections' => Collection::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image, $id)
    {
        $request->validate([
            "url" => ["required", "regex:/^(dummyimage.com)$/i"],
            "width" => "required|numeric",
            "height" => "required|numeric",
            "slug" => ["required", "regex:/^[a-zA-Z0-9-]{6}$/i"]
        ]);

        Image::findOrFail($id)->update($request->only('url', 'width', 'height', 'slug', 'collection_id'));

        $rowsBD = Couleur::whereIn('image_id', [$id])->get();

        for ($i = 0; $i < count($rowsBD); $i++) {
            $rowsBD[$i]->update([
                'codeHexa' => str_replace('#', '', $request->codeHexa[$i])
            ]);
        }

        return redirect()
            ->route('toutesImages')
            ->with('success', 'Image créée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image, $id)
    {
        Image::findOrFail($id)->delete();

        Couleur::where('image_id', $id)->delete();

        return redirect()
            ->route('toutesImages')
            ->with('success', 'Image supprimée avec succès.');
    }
}
