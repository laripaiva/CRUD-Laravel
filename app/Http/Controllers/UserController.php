<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Movie;
use App\MovieUser;


class UserController extends Controller
{
    public function login($email){
        $user = User::where('email', $email)->get()->first();
        return response()->json($user, 200);
    }

    public function users(){
        $users = User::all();
        return response()->json($users, 200);
    }

    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->save()){
            return response()->json(['message' => 'Operação concluída com sucesso', 'status' => 200]);
        }else{
            return response()->json(['message' => 'A operação não pode ser concluída', 'status' => 404]);
        }        
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->save()){
            return response()->json(['message' => 'Operação concluída com sucesso', 'status' => 200]);
        }else{
            return response()->json(['message' => 'A operação não pode ser concluída', 'status' => 404]);
        }   
    }

    public function destroy($id){
        $user = User::where('id', $id)->get()->first();
        $user->movies()->detach();
        if($user->delete()){
            return response()->json(['message' => 'Operação concluída com sucesso', 'status' => 200]);
        }else{
            return response()->json(['message' => 'A operação não pode ser concluída', 'status' => 404]);
        }   
    }

    public function favorites($user){
        $favorites = User::find($user);
        $favorites->movies()->get();

        return  response()->json($favorites->movies()->get());
       
    }

    public function like(Request $request){

        $user_movie = MovieUser::where('user_id', $request->user_id)->where('movie_id', $request->movie_id)->get()->first();
           
        if($user_movie == NULL || $user_movie==""){
            $user_movie = new MovieUser;

            $user_movie->user_id = $request->user_id;
            $user_movie->movie_id = $request->movie_id;
            $user_movie->save();

            return response()->json(['message' => 'Operação concluída com sucesso', 'status' => 200]);
        }else{
            return response()->json(['message' => 'A operação não pode ser concluída', 'status' => 404]);
        }
    }


    public function dislike(Request $request){
        $user_movie = MovieUser::where('user_id', $request->user_id)->where('movie_id', $request->movie_id)->get()->first();

        if($user_movie != NULL || $user_movie!=""){
            $user_movie->delete();
            return response()->json(['message' => 'Operação concluída com sucesso', 'status' => 200]);
        }else{
            return response()->json(['message' => 'A operação não pode ser concluída', 'status' => 404]);
        }
    }


}
