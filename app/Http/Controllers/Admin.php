<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\Sala;
use App\Models\Proiezione;

class Admin extends Controller
{
    public function filmTable(){
        $data = Film::all();
        return view('Admin.film', ['data' => $data]);
    }

    public function proiezTable(){
        $data = Proiezione::join('film', 'proiezione.film', '=', 'film.idFilm')->join('sala', 'proiezione.sala', '=', 'sala.idSala')->get();
        $sala = Sala::all();
        $film = Film::all();
        
        return view('Admin.proiez', ['data' => $data, 'sala' => $sala, 'film' => $film]);
    }

    public function salaTable(){
        $data = Sala::join('cinema', 'cinema.id', '=', 'sala.cinema')->get();   
        $cinema = Cinema::all();
        
        return view('Admin.sala', ['data' => $data, 'cinema' => $cinema]);
    }

    public function cinemaTable(){
        $data = Cinema::all();
        return view('Admin.cinema', ['data' => $data]);
    }

    public function addFilm(Request $req){
        $req->validate([
            'foto' => 'required|mimes:jpeg|max:5048',
            'copertina' => 'required|mimes:jpeg|max:5048'
        ]);

        Film::insert([
            'titolo' => $req->titolo,
            'genere' => $req->genere,
            'uscita' => $req->uscita,
            'regista' => $req->regista,
            'vmd' => $req->vmd,
            'desc' => $req->desc,
            'durata' => $req->durata,
            'attori' => $req->attori,
        ]);

        if(!is_null($req->file('foto'))){
            $id = Film::max('idFilm');
            $img = $req->file('foto');
            $name = $id . '.jpeg';
            $path = $img->move(public_path('Foto/film'), $name);
        }
        
        if(!is_null($req->file('copertina'))){
            $id = Film::max('idFilm');
            $img = $req->file('copertina');
            $name = $id . '-2.jpeg';
            $path = $img->move(public_path('Foto/film'), $name);
        }

        return redirect('dashboard/film');
    }

    public function addCinema(Request $req){
        Cinema::insert([
            'nome' => $req->nome,
            'citta' => $req->citta,
            'indirizzo' => $req->indirizzo,
            'nCiv' => $req->nCiv,
            'telefono' => $req->telefono,
            'multisala' => $req->multisala,
        ]);

        if(!is_null($req->capienza)){
            $idc = Cinema::max('id');
        
            Sala::insert([
                'capienza' => $req->capienza,
                'cinema' => $idc
            ]);
        }

        return redirect('dashboard/cinema');
    }

    public function addProiezione(Request $req){
        //Da Sistemare
        $proiez = Proiezione::all();

        foreach($proiez as $item){
            if($item->data == $req->data && $item->sala == $req->sala && $item->orario == ($req->orario.':00')){
                return redirect('dashboard/proiezione');
            }
        }
        $cap = Sala::where('idSala', '=', $req->sala)->first();
        Proiezione::insert([
            'sala' => $req->sala,
            'film' => $req->film,
            'data' => $req->data,
            'orario' => $req->orario,
            'bigVend' => $req->bigVend
        ]);

        return redirect('dashboard/proiezione');
    }

    public function addSala(Request $req){
        Sala::insert([
            'capienza' => $req->capienza,
            'cinema' => $req->cinema
        ]);

        return redirect('dashboard/sala');
    }

    public function removeFilm(Request $req){
        Proiezione::where('film', '=', $req->id)->delete();
        Film::where('idFilm', '=', $req->id)->delete();
        return redirect('/dashboard/film');
    }

    public function removeSala(Request $req){
        Proiezione::where('sala', '=', $req->id)->delete();
        Sala::where('idSala', $req->id)->delete();
        return redirect('/dashboard/sala');
    }

    public function removeCinema(Request $req){
        $asd = Sala::where('cinema', $req->id)->get();
        foreach($asd as $item){
            Proiezione::where('sala', '=', $item->idSala)->delete();
        }
        Sala::where('cinema', $req->id)->delete();
        Cinema::find($req->id)->delete();

        return redirect('/dashboard/cinema');
    }

    public function removeProiezione(Request $req){
        Proiezione::where('idProiez', '=', $req->id)->delete();
        return redirect('/dashboard/proiezione');
    }

    public function updateFilm(Request $req){

        if(!is_null($req->titolo)){
            Film::where('idFilm', '=', $req->id)->update(['titolo' => $req->titolo]);
        }
        if(!is_null($req->genere)){
            Film::where('idFilm', '=', $req->id)->update(['genere' => $req->genere]);
        }
        if(!is_null($req->durata)){
            Film::where('idFilm', '=', $req->id)->update(['durata' => $req->durata]);
        }
        if(!is_null($req->vmd)){
            Film::where('idFilm', '=', $req->id)->update(['vmd' => $req->vmd]);
        }

        return redirect('dashboard/film');
    }

    public function updateCinema(Request $req){
        $row = Cinema::find($req->id);

        if(!is_null($req->telefono)){
            $row->telefono = $req->telefono;
        }
        if(!is_null($req->multisala)){
            $row->multisala = 1;
        }

        $row->save();

        return redirect('dashboard/cinema');
    }

    public function updateSala(Request $req){
        if(!is_null($req->capienza)){
            Sala::where('idSala', '=', $req->id)->update(['capienza' => $req->capienza]);
        }

        return redirect('dashboard/sala');
    }

    public function updateProiezione(Request $req){
        //Da Sistemare
        if(!is_null($req->data)){
            $row = Proiezione::where('idProiez', '=', $req->id)->first();
            $proiez = Proiezione::where('sala', '=', $row->sala)->get();
            foreach($proiez as $item){
                if($item->orario == $row->orario && $item->data == $req->data){
                    return redirect('dashboard/proiezione');
                }
            }

            Proiezione::where('idProiez', '=', $req->id)->update(['data' => $req->data]);
        }
        if(!is_null($req->orario)){
            $row = Proiezione::where('idProiez', '=', $req->id)->first();
            $proiez = Proiezione::where('sala', '=', $row->sala)->get();
            foreach($proiez as $item){
                if($item->orario == $req->orario && $item->data == $row->data){
                    return redirect('dashboard/proiezione');
                }
            }

            Proiezione::where('idProiez', '=', $req->id)->update(['orario' => $req->orario]);
        }
        if(!is_null($req->bigVend)){
            Proiezione::where('idProiez', '=', $req->id)->update(['bigVend' => $req->bigVend]);
        }

        return redirect('dashboard/proiezione');
    }
}
