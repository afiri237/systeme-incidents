<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechnicianController extends Controller
{
    public function index()
    {
        // Incidents que je dois traiter
        $mesTaches = Incident::where('technician_id', Auth::id())
                              ->where('status', '!=', 'resolu')
                              ->latest()->get();

        // Incidents que personne n'a pris
        $incidentsLibres = Incident::whereNull('technician_id')->latest()->get();

        // Historique des incidents résolus
        $archives = Incident::where('technician_id', Auth::id())
                             ->where('status', 'resolu')
                             ->latest()->get();

        return view('technician.dashboard', compact('mesTaches', 'incidentsLibres', 'archives'));
    }

    // Action 1 : Je prends le ticket
    public function takeIncident(Incident $incident)
    {
        $incident->update([
            'technician_id' => Auth::id(),
            'status' => 'en_cours'
        ]);
        return back()->with('success', 'Ticket pris en charge.');
    }

    // Action 2 : Je termine le ticket
    public function resolveIncident(Incident $incident)
    {
        $incident->update(['status' => 'resolu']);
        return back()->with('success', 'Incident marqué comme résolu !');
    }
}