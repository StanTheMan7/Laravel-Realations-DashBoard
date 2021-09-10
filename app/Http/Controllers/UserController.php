<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backoffice.users.indexU', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('backoffice.users.createUser', compact('roles'));
    }
    public function store(Request $request)
    {
        request()->validate([
            "nom"=>["required", "min:1", "max:15"],
            "prenom"=>["required", "min:1", "max:15"],
            "age"=>["numeric", "min:1", "max:2"],
            "dateDeNaissence"=>["required", "min:1", "max:10"],
            "email"=>["required", "min:1", "max:50"],
            "motDePasse"=>["required", "min:1", "max:16"],
            "photoProfil"=>["required", "min:1", "max:200"],
            "role_id"=>["required", "min:1", "max:20"]
        ]);
        $newEntry = new User();
        $newEntry->nom = $request->nom;
        $newEntry->prenom = $request->prenom;
        $newEntry->age = $request->age;
        $newEntry->dateDeNaissence = $request->dateDeNaissence;
        $newEntry->email = $request->email;
        $newEntry->motDePasse = $request->motDePasse;
        $newEntry->photoProfil = $request->photoProfil;
        $newEntry->role_id = $request->role_id;
        $newEntry->save();
        return redirect()->route('users.index')->with('message', 'Created Successfully');
    }
}
