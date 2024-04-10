<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only('create', 'store');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.destroy')->only('destroy');
    }
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'))
            ->with('i', 0);
    }

    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $passw = obtenerIniciales($request->name) . generarNumeroAleatorio();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($passw),
            'avatar' => 'images/avatar.jpg',
            'modimpresion_id' => 1,
        ])->assignRole('Operador');

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado correctamente. Password: ' . $passw);
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'Usuario editado correctamente');
    }

    public function destroy(User $user)
    {
        $user->update([
            'status' => !$user->status
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Usuario modificado correctamente');
    }

    public function profile(User $user)
    {
        dd($user);
    }

    public function asinaRol(User $user)
    {
        $roles = Role::all();
        return view('user.asignaRol', compact('user', 'roles'));
    }


    public function updateRol(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('users.asignaRol', $user)
            ->with('success', 'Roles asignados correctamente');
    }

    public function resetPassword($id)
    {
        $user = User::find($id);

        $passw = obtenerIniciales($user->name) . generarNumeroAleatorio();

        $user->password = bcrypt($passw);
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'Nuevo Password: ' . $passw);
    }
}
