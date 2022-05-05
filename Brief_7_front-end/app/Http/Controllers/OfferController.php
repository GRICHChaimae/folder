<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Offer;


class OfferController extends Controller
{
    public function index(){
       return view('offre',[
            'offre' => 'offre'
        ]);
    }

    public function store(Request $request){
        $offer = new Offer();
        $offer->sexe = $request->input('sexe');
        $offer->description = $request->input('description');
        $offer->titre = $request->input('titre');
        $offer->image = $request->input('image');
        $offer->prix = $request->input('prix');
        $offer->user_id = $request->input('user_id');
        $offer->save();
          
    }
}
