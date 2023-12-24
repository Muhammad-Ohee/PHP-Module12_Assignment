<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        // Display user profile
        return view('users.show', compact('user'));
    }
}
