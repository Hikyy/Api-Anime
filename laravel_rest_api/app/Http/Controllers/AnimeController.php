<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\AnimeResource;
use Illuminate\Support\Facades\Mail;

// Voir le fichier AllController.php, j'y ai mis plusieurs variante de Controller.

class AnimeController extends Controller
{
    //

    public function getAnime(){
        //return response()->json(Product::all(),200);
        return AnimeResource::collection(Product::all());
    }

/*     public function getAnimeById($id){
        $Anime = Product::find($id);
        echo ;
        if(is_null($Anime)){
            return response()->json(['message' => 'Produit Introuvable'], 404);
        }
        return response()->json(Product::find($id),200);
    } */

    public function getAnimeById(Product $id){

        if(is_null($id)){
            return response()->json(['message' => 'Produit Introuvable'], 404);
        }
        Mail::to('mabroukr1997@gmail.com')->send(new TestMail());

        return new AnimeResource($id);
    }

    public function addAnime(Request $request){
        $An = $request->all();
        $An_flip = $request->all();

       $Array = array_flip(['title', 'Synopsis', 'Score', 'Image']);

        if(Count(array_intersect_key($Array, $An_flip)) < 4){
            return response()->json(['message' => 'Clé Manquante'], 404);
        }
        
 /*        $articles = Product::create([
            'title' => request('title'),
            'Synopsis' => request('Synopsis'),
            'Score' => request('Score'),
            'Image' => request('Image'),
        ]); */

         $Anime = Product::create($request->all());
        return response($Anime,201); 
        //return response()->json($articles, 201);
    }

    public function updateAnime(Request $request, $id){
        $Anime = Product::find($id);
        echo $Anime;
        if(is_null($Anime)){
            return response()->json(['message' => 'Produit Introuvable'], 404);
        }
        if(is_null($id)){
            return response()->json(['message' => 'Veuillez entrer un identifiant'], 404);
        }

        $Anime->update($request->all());
        return response($Anime,200);
    }

    public function deleteAnime($id){
        $Anime = Product::find($id);
        if(is_null($Anime)){
            return response()->json(['message' => 'Produit Introuvable'], 404);
        }
        $Anime->delete();
        
        return response()->json(['message' => 'Anime Delete'], 200);
    }

    public function bar($id)
    {


    }


}
