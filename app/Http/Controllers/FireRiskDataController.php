<?php

namespace App\Http\Controllers;

use App\Models\FireRiskData;
use App\Models\Coordinate;
use Illuminate\Http\Request;

class FireRiskDataController extends Controller
{
    public function index()
    {
        $items = FireRiskData::with('coordinate')->paginate(15);
        return view('fire_risk_data.index', compact('items'));
    }

    public function create()
    {
        $coordinates = Coordinate::all();
        return view('fire_risk_data.create', compact('coordinates'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'timestamp' => 'required|string',
            'location' => 'required|string',
            'duration' => 'required|numeric',
            'volunteers' => 'required|integer',
            'volunteer_name' => 'nullable|string',
            'name' => 'nullable|string',
            'coordinates_id' => 'required|exists:coordinates,id',
            'fire_risk' => 'required|numeric',
            'fire_detected' => 'required|boolean',
            'parameters_temperature' => 'nullable|numeric',
            'parameters_humidity' => 'nullable|numeric',
            'parameters_wind_speed' => 'nullable|numeric',
            'parameters_wind_direction' => 'nullable|numeric',
            'parameters_simulation_speed' => 'nullable|numeric',
            'initial_fires' => 'nullable|array',
        ]);

        if (isset($data['initial_fires'])) {
            $data['initial_fires'] = json_encode($data['initial_fires']);
        }

        FireRiskData::create($data);

        return redirect()->route('fire_risk_data.index')->with('success', 'Registro creado');
    }

    public function show(FireRiskData $fireRiskData)
    {
        return view('fire_risk_data.show', ['item' => $fireRiskData->load('coordinate')]);
    }

    public function edit(FireRiskData $fireRiskData)
    {
        $coordinates = Coordinate::all();
        return view('fire_risk_data.edit', compact('fireRiskData', 'coordinates'));
    }

    public function update(Request $request, FireRiskData $fireRiskData)
    {
        $data = $request->validate([
            'timestamp' => 'required|string',
            'location' => 'required|string',
            'duration' => 'required|numeric',
            'volunteers' => 'required|integer',
            'volunteer_name' => 'nullable|string',
            'name' => 'nullable|string',
            'coordinates_id' => 'required|exists:coordinates,id',
            'fire_risk' => 'required|numeric',
            'fire_detected' => 'required|boolean',
            'parameters_temperature' => 'nullable|numeric',
            'parameters_humidity' => 'nullable|numeric',
            'parameters_wind_speed' => 'nullable|numeric',
            'parameters_wind_direction' => 'nullable|numeric',
            'parameters_simulation_speed' => 'nullable|numeric',
            'initial_fires' => 'nullable|array',
        ]);

        if (isset($data['initial_fires'])) {
            $data['initial_fires'] = json_encode($data['initial_fires']);
        }

        $fireRiskData->update($data);

        return redirect()->route('fire_risk_data.index')->with('success', 'Registro actualizado');
    }

    public function destroy(FireRiskData $fireRiskData)
    {
        $fireRiskData->delete();
        return redirect()->route('fire_risk_data.index')->with('success', 'Registro eliminado');
    }
}
