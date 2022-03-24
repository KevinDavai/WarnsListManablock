<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Warns;
use App\Events\WarnAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarnsController extends Controller
{
    public function index()
    {
        return Inertia::render('Warns');
    }

    public function getListWarn()
    {
        $warns = Warns::orderBy('created_at', 'desc')->get();
        return response()->json($warns);
    }

    public function postWarn(Request $request)
    {
        $request->validate([
            'raison' => ['required'],
            'pseudo' => ['required'],
            'description' => ['required'],
        ]);

        $user = User::find(Auth::id());

        $warn = Warns::create([
            'pseudo' => $request->pseudo,
            'description' => $request->description,
            'warn_name' => $request->raison,
            'moderator' => $user->pseudo,
        ]);

        event(new WarnAdded($warn));

        // Send response
        $response = [
            'error' => false,
            'message' => "Succes",
            'ronde' => $warn,
        ];

        return response($response, 201);
    }
}
