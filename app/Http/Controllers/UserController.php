<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Tampilkan semua user
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    // Tampilkan form create
    public function create()
    {
        return view('users.create');
    }

    // Simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'puskesmas' => 'required|string|max:255',
            'bagian' => 'required|string|max:255',
            'username'=> 'required|unique:users,username,',
            'email'=> 'required|email|unique:users,email,',
            'password'=> 'nullable|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'lokasi_kerja' => $request->puskesmas,
            'bagian' => $request->bagian,
            'username' => $request->username,
            'password'=> bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Tampilkan form edit
    public function edit(User $user)
    {

        return view('users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, User $user)
    {

        $request->validate([
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);


        $user->name = $request->name;
        $user->nip= $request->nip;
        $user->jabatan = $request->jabatan;
        $user->lokasi_kerja= $request->puskesmas;
        $user->bagian = $request->bagian;
        $user->username = $request->username;
        $user->email= $request->email;


        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Hapus user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
