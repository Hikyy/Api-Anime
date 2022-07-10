<?php

    // Ce fichier présente les différentes methodes au niveau du controlleur que j'ai pu trouver au fil de mes recherche.
    // Ce n'est pas un fichier à charger.

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

    ////////////////////////////////

    public function addAnime(Request $request){
        $An = $request->all();
        $An_flip = $request->all();

       $Array = array_flip(['title', 'Synopsis', 'Score', 'Image']);

        if(Count(array_intersect_key($Array, $An_flip)) < 4){
            return response()->json(['message' => 'Clé Manquante'], 404);
        }

         $Anime = Product::create($request->all());
        return response($Anime,201); 
    }


    public function addAnime(Request $request){
        
            $articles = Product::create([
            'title' => request('title'),
            'Synopsis' => request('Synopsis'),
            'Score' => request('Score'),
            'Image' => request('Image'),
        ]); 


        return response()->json($articles, 201);
    }

    ///////////////////////////

    public function save(Request $request)
    {
         $request->validate([

            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $imageName = time().'.'.$request->Image->getClientOriginalName();  

        $request->Image->storeAs('images', $imageName);

        Product::create([
            'title' => request('title'),
            'Synopsis' => request('Synopsis'),
            'Score' => request('Score'),
            'Image' => $imageName,
        ]);
        return redirect('file');
    }