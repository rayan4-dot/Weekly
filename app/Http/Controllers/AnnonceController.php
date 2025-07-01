<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnonceRequest;
use App\Http\Requests\UpdateAnnonceRequest;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonces = Annonce::with(['user', 'categorie'])
            ->whereNull('deleted_at')
            ->orderByDesc('created_at')
            ->paginate(10);
        return view('annonces.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('annonces.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnonceRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        Annonce::create($data);
        return redirect()->route('annonces.index')->with('success', 'Annonce créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        return view('annonces.show', compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        $this->authorize('update', $annonce);
        $categories = Categorie::all();
        return view('annonces.edit', compact('annonce', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnonceRequest $request, Annonce $annonce)
    {
        $this->authorize('update', $annonce);
        $annonce->update($request->validated());
        return redirect()->route('annonces.index')->with('success', 'Annonce modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy(Annonce $annonce)
    {
        $this->authorize('delete', $annonce);
        $annonce->delete();
        return redirect()->route('annonces.index')->with('success', 'Annonce supprimée avec succès.');
    }
}
