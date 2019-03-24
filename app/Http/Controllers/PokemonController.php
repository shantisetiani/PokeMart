<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Element;
use App\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PokemonController extends Controller
{
    public function ShowInsertPokemonPage(){
        $element = Element::get();
        return view('admin.insertPokemon',compact('element'));
    }

    public function InsertPokemon(Request $req){
        $valid = Validator::make($req->all(),[
            'name' => 'required|alpha|min:3',
            'element' => 'required',
            'image' => 'required|image',
            'gender' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:1000'
        ]);
        if($valid->fails()){
            return back()->withErrors($valid->errors())->withInput();
        }

        $table = new Pokemon();
        $table->name = $req->name;
        $table->element = $req->element;

        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $ext = $file->extension();
            $filename = time().".".$ext;
            $file->move('img/PokemonList', $filename);
            $table->image = $filename;
        }

        $table->gender = $req->gender;
        $table->description = $req->description;
        $table->price = $req->price;
        $table->save();

        $pokemon = Pokemon::paginate(24);

        return view('pokemonList',compact('pokemon'));
    }

    public function GetAllPokemon(){
        $pokemon = Pokemon::paginate(24);
        return view('pokemonList',compact('pokemon'));
    }

    public function SearchPokemon(Request $req){
        $search = $req->search;

        $pokemon = Pokemon::where('name','like','%'.$search.'%')
            ->orwhere('element','like','%'.$search.'%')
            ->paginate(24);
        return view('pokemonList',compact('pokemon','search'));
    }

    public function GetPokemonById(Request $req){
        $pokemon = Pokemon::where('id','=',$req->pokemon_id)->get();
        $element = Element::get();
        $comment = Comment::where('id','=',$req->pokemon_id)->get();

        if($req->user_id == 1){
            return view('admin.updatePokemon', compact('pokemon','element'));
        }else {
            return view('pokemonDetail', compact('pokemon','comment'));
        }
    }

    public function UpdatePokemon(Request $req){
        $valid = Validator::make($req->all(),[
            'name' => 'required|alpha|min:3',
            'element' => 'required',
            'image' => 'required|image',
            'gender' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:1000'
        ]);
        if($valid->fails()){
            return back()->withErrors($valid->errors())->withInput();
        }

        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $ext = $file->extension();
            $filename = time().".".$ext;
            $file->move('img/PokemonList', $filename);

            Pokemon::where('id','=',$req->id)->update(
                [
                    'image'=>$filename
                ]
            );
        }

        Pokemon::where('id','=',$req->id)->update(
            [
                'name'=>$req->name,
                'element'=>$req->element,
                'gender'=>$req->gender,
                'description'=>$req->description,
                'price'=>$req->price
            ]
        );

        $pokemon = Pokemon::paginate(24);
        $msg = "Succesfully update pokemon !";

        return view('pokemonList',compact('pokemon','msg'));
    }

    public function DeletePokemon(Request $req){
        Pokemon::where('id','=',$req->pokemon_id)->delete();

        $pokemon = Pokemon::paginate(24);
        $msg = "Succesfully delete pokemon !";

        return view('pokemonList',compact('pokemon','msg'));
    }

    public function InsertElement(Request $req){
        $table = new Element();
        $table->element = $req->element;
        $table->save();

        $msg = "Succesfully insert element !";
        return view('admin.insertElement',['msg'=>$msg]);
    }

    public function ShowUpdateElementPage(){
        $element = Element::get();
        return view('admin.updateElement',compact('element'));
    }

    public function GetElementById(Request $req){
        $element = Element::where('id','=',$req->element_id)->get();
        return view('admin.insertElement',compact('element'));
    }

    public function UpdateElement(Request $req){
        Element::where('id','=',$req->element_id)->update(
            [
                'element'=>$req->element
            ]
        );
        $element = Element::get();

        $msg = "Succesfully update element !";

        return view('admin.updateElement',compact('element','msg'));
    }
}