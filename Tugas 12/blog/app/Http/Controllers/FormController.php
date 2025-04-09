<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function submitRegisterForm(Request $request)
    {
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');

        return view('welcome', compact('firstName', 'lastName'));
}
}
