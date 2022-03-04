<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function getRole()
    {
        $user = User::find(Auth::id());
        $role = Roles::find($user->role_id);
        return $role->name;
    }
}
