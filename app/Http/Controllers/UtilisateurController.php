<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function getAll() {
        $users = User::orderBy('created_at', 'desc')->get();
        return response()->json($users);
    }

    public function getHisRole($role_id)
    {
        $role = Roles::find($role_id);
        return $role;
    }

    public function updateRole(Request $request, Roles $role) {
        

        $request->validate([
            'user' => ['required'],
            'role' => ['required'],
        ]);

        $user = User::find($request->user['id']);
        $user->role_id = $request->role['id'];

        $user->save();

        // Send response
        $response = [
            'error' => false,
            'message' => "Succes",
            'user' => $user,
        ];

        return response($response, 201);

    }
}
