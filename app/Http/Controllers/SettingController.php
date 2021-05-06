<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'surname' => ['required', 'string', 'max:255'],
            'other_names' => ['required', 'string', 'max:255'],
        ]);
    }
}
