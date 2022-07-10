<?php

////////////////////////

    public function getAnime(){
        return AnimeResource::collection(Product::all());
    }

////////////////////////
    public function getAnime(){
        return response()->json(Product::all(),200);
    }

////////////////////////

    public function getAnimeById(Product $id){

            if(is_null($id)){
                return response()->json(['message' => 'Produit Introuvable'], 404);
            }
 
            return new AnimeResource($id);
    }

////////////////////////

    //Pour utliser la methode 2, il faut remplacer le param de la function getAnimeById par (Product $id)
    //Par contre, la condition ne marchera plus.
    public function getAnimeById($id){
            $Anime = Product::find($id);

            if(is_null($id)){
                return response()->json(['message' => 'Produit Introuvable'], 404);
            }

            //Methode 1 :
            return response()->json(Product::find($id),200);
            
            {OR}

            //Methode 2 :
            return response()->json($id);
    }