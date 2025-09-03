<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'ci' => 'required|string|unique:users,ci',
            'password' => 'required|string|min:6',
            'telefono' => 'nullable|string',
            'is_admin' => 'nullable|boolean',
            'state' => 'nullable|string',
            'entidad_perteneciente' => 'nullable|string',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Usuario creado');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'ci' => 'required|string|unique:users,ci,' . $user->id,
            'password' => 'nullable|string|min:6',
            'telefono' => 'nullable|string',
            'is_admin' => 'nullable|boolean',
            'state' => 'nullable|string',
            'entidad_perteneciente' => 'nullable|string',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado');
    }
}
