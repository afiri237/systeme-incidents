<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $totalIncidents = Incident::count();
        return view('admin.dashboard', compact('users', 'totalIncidents'));
    }

    public function updateRole(Request $request, User $user)
    {
        $user->update(['role' => $request->role]);
        return back()->with('success', 'Rôle mis à jour avec succès.');
    }
    public function storeUser(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role' => 'required'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    return back()->with('success', 'Nouvel utilisateur créé !');
}
}