<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::with('role')->get(); // Lista activa e inactiva
        return view('users.index', compact('users'));
    }

    public function create() {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role_id' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'is_active' => true
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado.');
    }

    public function edit(User $user) {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user) {
        $data = $request->only(['name', 'email', 'role_id']);
        $data['is_active'] = $request->has('is_active');
        
        if($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        return redirect()->route('users.index')->with('success', 'Usuario actualizado.');
    }
}