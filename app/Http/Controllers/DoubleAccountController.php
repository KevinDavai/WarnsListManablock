<?php

namespace App\Http\Controllers;

use App\Events\DoubleAccAdded;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\DoubleAccount;
use Illuminate\Support\Facades\Auth;

class DoubleAccountController extends Controller
{
    public function index()
    {
        return Inertia::render('Doubleacc');
    }

    public function getListRonde()
    {
        $doubleAcc = DoubleAccount::orderBy('created_at', 'desc')->get();
        return response()->json($doubleAcc);
    }

    public function postDoubleAcc(Request $request)
    {
        $request->validate([
            'pseudo' => ['required', 'moreThan2'],
            'description' => ['required'],
        ]);

        $user = User::find(Auth::id()); // Modérator pseudo

        $doubleAcc = DoubleAccount::create([
            'pseudo' => $request->pseudo,
            'description' => $request->description,
            'pseudo_moderator' => $user->pseudo,
        ]);

        event(new DoubleAccAdded($doubleAcc));

        // Send response
        $response = [
            'error' => false,
            'message' => "Succes",
            'double-compte' => $doubleAcc,
        ];

        return response($response, 201);
    }
}

