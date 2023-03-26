<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComandaRequest;
use App\Models\Comanda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ComandaController extends Controller
{
    function seeAll(?Request $req){

        $search = null;

        if($req != null && $req->input('s') != null){

            $search = $req->input('s');

            $dades = Comanda::where('product', 'LIKE', "%{$search}%")->get();

        }else{
            $dades = Comanda::all();
        }

        return view('seeAllComandes', ['dades' => $dades, 'search' => $search, 'username' => Auth::check() ? Auth::user() : null]);
    }

    function ownComandes(?Request $req){

        $search = null;

        if($req != null && $req->input('s') != null){

            $search = $req->input('s');

            $dades = Comanda::where([['user_id', '=', Auth::user()->id], ['product', 'LIKE', "%{$search}%"]])->get();

        }else{
            $dades = Comanda::where('user_id', '=', Auth::user()->id)->get();
        }

        return view('seeAllComandes', ['dades' => $dades, 'search' => $search, 'username' => Auth::check() ? Auth::user() : null, 'searchURL' => "/comanda/own"]);

    }

    function seeComanda($id){

        $comanda = Comanda::find($id);

        return view('seeComanda', ['dada' => $comanda, 'username' => Auth::check() ? Auth::user() : null]);

    }
    
    function addComanda(ComandaRequest $req){

        $comanda = $this->create_updateComanda($req);

        return redirect("comanda/$comanda->id");

    }

    function editComanda($id){

        $comanda = Comanda::find($id);

        if($comanda->user->id != Auth::user()->id) return redirect("comanda/$id");

        return view('editComanda', ['dada' => $comanda, 'username' => Auth::check() ? Auth::user() : null]);
        
    }

    function updateComanda(ComandaRequest $req, $id){

        $comanda = Comanda::find($id);

        if(Auth::user()->id !=$comanda->user->id){
            abort(403);
            return redirect("comanda");
        }

        $comanda = $this->create_updateComanda($req, $id);

        return view('seeComanda', ['dada' => $comanda, 'username' => Auth::check() ? Auth::user() : null]);

    }
    
    function deleteComanda($id){

        $comanda = Comanda::find($id);

        if(Auth::user()->id !=$comanda->user->id){
            abort(403);
            return redirect("comanda");
        }

        $comanda->delete();

        return $this->seeAll(null);

    }

    private function create_updateComanda(ComandaRequest $req, $id = null){

        $comanda = $id == null ? new Comanda :  Comanda::find($id);

        $comanda->product = $req->input('product');
        $comanda->amount = $req->input('amount');
        $comanda->address = $req->input('address');
        $comanda->price = $req->input('price');
        $comanda->priceIva = $req->input('priceIVA');
        $comanda->user_id = Auth::user()->id;

        $comanda->save();

        return $comanda;

    }

}
