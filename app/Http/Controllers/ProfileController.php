<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('profile.show');
    }
    public function edit()
    {
        return view('profile.edit');
    }
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:100'],
        ]);

        $user->fill($validated)->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
