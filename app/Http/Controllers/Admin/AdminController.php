<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard');
    }

    public function utilisateur()
    {
        $users = User::orderBy('created_at', 'asc')->get();

        foreach($users as $user) {
            $role = Roles::find($user->role_id);
            $user->role = $role;
        }
        
        return Inertia::render('Admin/Utilisateur', [
            'roles' => Roles::orderBy('name', 'asc')->get(),
            'users' => $users,
        ]);
    }

    public function getUserWithRole() {
        $users = User::orderBy('created_at', 'asc')->get();

        foreach($users as $user) {
            $role = Roles::find($user->role_id);
            $user->role = $role;
        }

        return response()->json($users);
    }


}