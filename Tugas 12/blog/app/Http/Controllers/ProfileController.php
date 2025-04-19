<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProfileController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth'),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = Auth::user(); // Ambil user yang sedang login
    $profile = Profile::where('user_id', $user->id)->first();

    if (!$profile) {
        // Jika profil belum ada, arahkan ke halaman create
        return redirect()->route('profile.create');
    }

    // Jika profil sudah ada, arahkan ke halaman detail
    return redirect()->route('profile.show', $user->id);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Auth::user();
        return view('profile.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required|integer|min:1',
            'address' => 'required|string|max:255',
        ]);

        Profile::create([
            'user_id' => $request->user_id,
            'age' => $request->age,
            'address' => $request->address,
        ]);

        return redirect()->route('profile.index')->with('success', 'Profile berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $users = Auth::user();
    $profile = Profile::with('user')->where('user_id', $id)->firstOrFail(); // Cari berdasarkan user_id
    return view('profile.detail', ['profile' => $profile , 'users' => $users]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = Profile::findOrFail($id);
        $users = Auth::user();
        return view('profile.edit', ['profile' => $profile, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'age' => 'required|integer|min:1',
            'address' => 'required|string|max:255',
        ]);

        $profile = Profile::findOrFail($id);
        $profile->user_id = $request->user_id;
        $profile->age = $request->age;
        $profile->address = $request->address;
        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Profile berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->route('profile.index')->with('success', 'Profile berhasil dihapus.');
    }
}
