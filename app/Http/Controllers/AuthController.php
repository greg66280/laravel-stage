<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Custom models
use App\Models\User;

class AuthController extends Controller
{
    protected function login_get() {
        return view("login");
    }

    protected function register_get() {
        return view("register");
    }

    protected function register_post(Request $request) {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required|min:6",
            "confpassword" => "required|same:password"
        ],
        [
            "required" => "Le champ :attribute est requis",
            "email" => "L'email doit être une adresse valide",
            "same" => "Les deux mots de passes doivent être identiques",
            "min" => "Le mot de passe doit faire au moins 6 caractères"
        ]    
    );
        $datas = $request->all();

        $hasUser = User::hasUser($datas["email"]);
        if (is_null($hasUser)) {
            $user = User::create([
                "name" => $datas["name"],
                "email" => $datas["email"],
                "password" => password_hash($datas["password"], PASSWORD_BCRYPT)
            ]);
            auth()->login($user);
            return redirect()->route("panel_home_get")->with("success", "Bienvenue sur Adeo {$user->name}");
        }
        else {
            return redirect()->back()->with("error", "Bienvenue sur Adeo {$user->name}");
        }
    }

    protected function logout() {
        auth()->logout();
        return redirect()->route("login_get")->with("success", "Vous avez bien été déconnecté");
    }

    protected function invoice() {
        auth()->invoice();
        return redirect()->route("invoice")->with("success", "Vous avez bien été redirigez vers les factures");
    }

    protected function login_post(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ],
        [
            "email" => "L'email doit être une adresse valide",
            "required" => "Le champ :attribute est requis"
        ]
        );
        $datas = $request->all();

        $hasUser = User::hasUser($datas["email"]);
        if (is_null($hasUser)) {
            return redirect()->back()->with("error", "Aucun utilisateur connu avec cette adresse email");
        }
        else {
            if (password_verify($datas['password'], $hasUser->password)) {
                auth()->login($hasUser);
                return redirect()->route("panel_home_get")->with("success", "Bienvenue {$hasUser->name}");
            }
            else {
                return redirect()->back()->with("error", "Le mot de passe est incorrect");
            }
        }   
    }
}
