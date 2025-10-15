<?php

namespace App\Http\Controllers;

use App\Models\Biomasa;
use Illuminate\Http\Request;

class BiomasaController extends Controller
{
    public function index()
    {
        $biomasas = Biomasa::orderBy('tipo_biomasa')->paginate(10);
        return view('biomasas.index', compact('biomasas'));
    }

    public function create()
    {
        return view('biomasas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_biomasa' => 'required|max:255',
            'descripcion' => 'nullable',
            'densidad' => 'required|in:Baja,Media,Alta',
            'poder_calorifico' => 'required|numeric|between:0,99999.99',
            'degradacion' => 'required|in:Baja,Media,Alta'
        ]);

        Biomasa::create($validated);

        return redirect()->route('biomasas.index')
            ->with('success', 'Biomasa creada exitosamente.');
    }

    public function show(Biomasa $biomasa)
    {
        return view('biomasas.show', compact('biomasa'));
    }

    public function edit(Biomasa $biomasa)
    {
        return view('biomasas.edit', compact('biomasa'));
    }

    public function update(Request $request, Biomasa $biomasa)
    {
        $validated = $request->validate([
            'tipo_biomasa' => 'required|max:255',
            'descripcion' => 'nullable',
            'densidad' => 'required|in:Baja,Media,Alta',
            'poder_calorifico' => 'required|numeric|between:0,99999.99',
            'degradacion' => 'required|in:Baja,Media,Alta'
        ]);

        $biomasa->update($validated);

        return redirect()->route('biomasas.index')
            ->with('success', 'Biomasa actualizada exitosamente.');
    }

    public function destroy(Biomasa $biomasa)
    {
        $biomasa->delete();

        return redirect()->route('biomasas.index')
            ->with('success', 'Biomasa eliminada exitosamente.');
    }
}
