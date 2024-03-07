<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile', [
            'title' => 'Profile'
        ]);
    }

    public function update()
    {
        $user = auth()->user();
        request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'unique:users,email,' . $user->id . ''],
            'avatar' => ['image', 'mimes:jpg,jpeg,png,svg', 'max:2048']
        ]);

        if (request('password')) {
            request()->validate([
                'password' => ['min:5', 'confirmed'],
            ]);
        }

        DB::beginTransaction();
        try {
            $data = request()->only(['name', 'email']);
            request('password') ? $data['password'] = bcrypt(request('password')) : NULL;
            request()->file('avatar') ? $data['avatar'] = request()->file('avatar')->store('users', 'public') : NULL;
            $user->update($data);

            DB::commit();
            return redirect()->route('profile.index')->with('success', 'Profile berhasil diupdate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
