<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(): \Inertia\Response
    {
        $users = User::all();

        return Inertia::render('User/Index', [
            'users' => $users

        ]);
    }

}
