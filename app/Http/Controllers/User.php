<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Proiezione;
use App\Models\Carrello;
use App\Models\Vendite;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{
    public function film($id){
        $film = Film::where('idFilm','=',$id)->get();
        
        return view('User.film', ['film' => $film]);
    }

    public function search(Request $req){
        $proiez = Proiezione::join('sala', 'sala.idSala', '=', 'proiezione.sala')
            ->where('sala.cinema', '=', $req->cinema)
            ->join('cinema', 'cinema.id', '=', 'sala.cinema')
            ->join('film', 'film.idFilm', '=', 'proiezione.film')
            ->get();

        return view('User.proiezFilm', ['proiez' => $proiez]);
    }

    public function proiezFilm($id){
        $proiez = Film::where('idFilm','=',$id)
            ->join('proiezione', 'proiezione.film', '=', 'film.idFilm')
            ->join('sala', 'proiezione.sala', '=', 'sala.idSala')
            ->join('cinema', 'cinema.id', '=', 'sala.cinema')
            ->select(
                'proiezione.idProiez', 'proiezione.data', 'proiezione.orario', 'proiezione.bigVend',
                'film.titolo', 'film.genere', 'film.durata', 'film.attori', 'film.idFilm',
                'sala.capienza',
                'cinema.nome'
            )
            ->get();
        
        return view('User.proiezFilm', ['proiez' => $proiez]);
    }

    public function proiez(){
        $proiez = Film::
            join('proiezione', 'proiezione.film', '=', 'film.idFilm')
            ->join('sala', 'proiezione.sala', '=', 'sala.idSala')
            ->join('cinema', 'cinema.id', '=', 'sala.cinema')
            ->select(
                'proiezione.idProiez', 'proiezione.data', 'proiezione.orario', 'proiezione.bigVend',
                'film.titolo', 'film.genere', 'film.durata', 'film.attori', 'film.idFilm',
                'sala.capienza',
                'cinema.nome'
            )
            ->orderBy('proiezione.data')
            ->orderBy('proiezione.orario')
            ->get();
        
        return view('User.proiezFilm', ['proiez' => $proiez]);
    }

    public function carrello(){
        $user = Auth::user()->email;
        $cart = Carrello::join('proiezione', 'proiezione.idProiez', '=', 'carrello.proiezione')
            ->join('film', 'proiezione.film', '=', 'film.idFilm')
            ->join('sala', 'proiezione.sala', '=', 'sala.idSala')
            ->join('cinema', 'sala.cinema', '=', 'cinema.id')
            ->where('carrello.utente', '=', $user)
            ->select(
                'carrello.idCar', 'carrello.quantita', 'carrello.tipologia',
                'proiezione.data', 'proiezione.orario', 'proiezione.bigVend',
                'film.titolo', 'film.idFilm',
                'sala.idSala', 'sala.capienza',
                'cinema.nome'
            )
            ->get();
            
        return view('User.carrello', ['cart' => $cart]);
    }

    public function addCart(Request $req){
        $user = Auth::user()->email;
        $row = new Carrello();
        $proiez = Proiezione::join('sala', 'sala.idSala', '=', 'proiezione.sala')
            ->where('proiezione.idProiez', '=', $req->idProiez)
            ->first();
        
        $db = Carrello::where([
            ['utente', '=', $user],
            ['proiezione', '=', $req->idProiez],
            ['tipologia', '=', $req->tipologia]
        ])->first();
        
        if(!is_null($db)){
            $q = $db->quantita + 1;
            Carrello::where([
                ['utente', '=', $user],
                ['proiezione', '=', $req->idProiez],
                ['tipologia', '=', $req->tipologia]
            ])
            ->update(['quantita' => $q]);
        }else{
            if($proiez->capienza - $proiez->bigVend - 1 >= 0){
                $row->utente = $user;
                $row->proiezione = $req->idProiez;
                $row->quantita = 1;
                $row->tipologia = $req->tipologia;
                $row->save();
            }
        }
        

        return redirect('/carrello');
    }

    public function updateCart(Request $req){
        $row = Carrello::where([
            ['idCar', '=', $req->id],
        ])->first();

        
        if($row != '[]'){
            if($req->quantita == 0){
                Carrello::where([
                    ['idCar', '=', $req->id],
                ])->delete();
            }else{
                Carrello::where('idCar', '=', $req->id)->update( ['quantita' => $req->quantita]);
            }
        }
        
        return redirect('/carrello');
    }

    public function buy(Request $req){
        $user = Auth::user()->email;
        $cart = Carrello::where('utente', '=', $user)->get();

        foreach($cart as $item){
            if($item->quantita > 0){
                $proiez = Proiezione::where('idProiez', '=', $item->proiezione)
                    ->join('sala', 'sala.idSala', '=', 'proiezione.sala')
                    ->first();
                    
                $diff = $proiez->capienza - $proiez->bigVend - $item->quantita;
                if($diff >= 0){
                    $vend = new Vendite();
                    $vend->proiezione = $item->proiezione;
                    $vend->utente = $user;
                    $vend->quantita = $item->quantita;
                    $vend->tipologia = $item->tipologia;
                    $vend->save();

                    $b = $proiez->bigVend + $item->quantita;
                    Proiezione::where('idProiez', '=', $item->proiezione)
                        ->update(['bigVend' => $b]);

                    Carrello::where('idCar','=',$item->idCar)->delete();
                }
            }
        }

        return redirect('/dashboard');
    }

    public function storico(){
        $user = Auth::user()->email;
        $storico = Vendite::where('utente', '=', $user)
            ->join('proiezione', 'proiezione.idProiez','=', 'vendite.proiezione')
            ->join('sala', 'proiezione.sala', '=', 'sala.idSala')
            ->join('cinema', 'cinema.id', '=', 'sala.cinema')
            ->join('film', 'film.idFilm', '=', 'proiezione.film')
            ->select(
                'vendite.quantita', 'vendite.tipologia',
                'proiezione.data', 'proiezione.orario',
                'sala.idSala',
                'cinema.nome',
                'film.idFilm', 'film.titolo'
            )
            ->get();

        return view('User.storico', ['storico' => $storico]);
    }
}
