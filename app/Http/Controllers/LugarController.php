<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    public function index()
    {
        $lugares = Lugar::orderBy('nombre_lugar')->paginate(10);
        return view('lugares.index', compact('lugares'));
    }

    public function create()
    {
        return view('lugares.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_lugar' => 'required|max:255',
            'ubicacion' => 'nullable|max:255',
            'tipo_lugar' => 'required|max:255',
            'descripcion' => 'nullable'
        ]);

        Lugar::create($validated);

        return redirect()->route('lugares.index')
            ->with('success', 'Lugar creado exitosamente.');
    }

    public function show(Lugar $lugar)
    {
        return view('lugares.show', compact('lugar'));
    }

    public function edit(Lugar $lugar)
    {
        return view('lugares.edit', compact('lugar'));
    }

    public function update(Request $request, Lugar $lugar)
    {
        $validated = $request->validate([
            'nombre_lugar' => 'required|max:255',
            'ubicacion' => 'nullable|max:255',
            'tipo_lugar' => 'required|max:255',
            'descripcion' => 'nullable'
        ]);

        $lugar->update($validated);

        return redirect()->route('lugares.index')
            ->with('success', 'Lugar actualizado exitosamente.');
    }

    public function destroy(Lugar $lugar)
    {
        $lugar->delete();

        return redirect()->route('lugares.index')
            ->with('success', 'Lugar eliminado exitosamente.');
    }
}
