<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;


class MovieController extends Controller
{
    public function movies(){
        $movies = Movie::all();
        return response()->json($movies, 200);
    }

    public function store(Request $request){
        $movie = new Movie;
        $movie->title = $request->title;
        $movie->description = $request->description;
        if($movie->save()){
            return response()->json(['message' => 'Operação concluída com sucesso', 'status' => 200]);
        }else{
            return response()->json(['message' => 'A operação não pode ser concluída', 'status' => 404]);
        }    
    }

    public function update(Request $request, $id){
        $movie = Movie::findOrFail($id);
        $movie->title = $request->title;
        $movie->description = $request->description;
        if($movie->save()){
            return response()->json(['message' => 'Operação concluída com sucesso', 'status' => 200]);
        }else{
            return response()->json(['message' => 'A operação não pode ser concluída', 'status' => 404]);
        }   
    }

    public function destroy($id){
        $movie = Movie::where('id', $id)->get()->first();
        $movie->users()->detach();
        if($movie->delete()){
            return response()->json(['message' => 'Operação concluída com sucesso', 'status' => 200]);
        }else{
            return response()->json(['message' => 'A operação não pode ser concluída', 'status' => 404]);
        }     
    }

    
}
