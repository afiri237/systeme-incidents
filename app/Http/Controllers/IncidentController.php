<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncidentController extends Controller
{
    public function index()
    {
        // On récupère les incidents de l'utilisateur connecté
        $incidents = Incident::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', compact('incidents'));
    }

    public function create() {
    $categories = Category::all();
    $equipments = \App\Models\Equipment::all(); // On ajoute cette ligne
    return view('incidents.create', compact('categories', 'equipments'));
}

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'category_id' => 'required|exists:categories,id',
        'equipment_id' => 'nullable|exists:equipment,id', // Ajoutez ceci
        'priority' => 'required'
    ]);

    Incident::create([
        'title' => $request->title,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'equipment_id' => $request->equipment_id, // Ajoutez ceci
        'priority' => $request->priority,
        'user_id' => Auth::id(),
        'status' => 'en_attente'
    ]);

    return redirect()->route('dashboard')->with('success', 'Incident signalé !');
}
    public function show(Incident $incident) {
    // Vérifier que l'utilisateur a le droit de voir cet incident
    if(auth()->user()->role !== 'admin' && auth()->user()->role !== 'technician' && $incident->user_id !== auth()->id()){
        abort(403);
    }
    return view('incidents.show', compact('incident'));
}
}