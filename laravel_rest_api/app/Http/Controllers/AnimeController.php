<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\AnimeResource;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\AnimeCheckGood;

// Voir le fichier AllController.php, j'y ai mis plusieurs variante de Controller.

class AnimeController extends Controller
{
    //

    public function getAnime()
    {
        return AnimeResource::collection(Product::all());
    }


    public function getAnimeById(Product $id)
    {

        if(is_null($id)){
            return response()->json(['message' => 'Produit Introuvable'], 404);
        }

        return new AnimeResource($id);
    }


    public function addAnime(AnimeCheckGood $request)
    {

        $request->validated();
        $An_flip = $request->all();

       $Array = array_flip(['title', 'Synopsis', 'Score', 'Image']);

        if(Count(array_intersect_key($Array, $An_flip)) < 4){
            return response()->json(['message' => 'Clé Manquante'], 404);
        }
        Mail::to('mabroukr1997@gmail.com')->send(new TestMail()); 

         $Anime = Product::create($request->all());
        return response($Anime,201); 
    }


    public function updateAnime(AnimeCheckGood $request, $id)
    {
        $request->validated();
        $Anime = Product::find($id);

        if(is_null($Anime)){
            return response()->json(['message' => 'Produit Introuvable'], 404);
        }

        $Anime->update($request->all());
        return response($Anime,200);
    }

    public function deleteAnime($id)
    {
        $Anime = Product::find($id);
        if(is_null($Anime)){
            return response()->json(['message' => 'Produit Introuvable'], 404);
        }
        $Anime->delete();
        
        return response()->json(['message' => 'Anime Delete'], 200);
    }

    public function save(AnimeCheckGood $request)
    {
        $request->validated();

        $imageName = time().'.'.$request->Image->getClientOriginalName();  

        $request->Image->storeAs('images', $imageName);

        Product::create([
            'title' => request('title'),
            'Synopsis' => request('Synopsis'),
            'Score' => request('Score'),
            'Image' => $imageName,
        ]);

        Mail::to('mabroukr1997@gmail.com')->send(new TestMail()); 

        return redirect('file');
    }

}
