<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Rondes;
use App\Events\RondeAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RondesController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Dashboard');
    }

    public function getListRonde()
    {
        $rondes = Rondes::orderBy('created_at', 'desc')->get();
        return response()->json($rondes);
    }

    public function postRonde(Request $request)
    {
        $request->validate([
            'description' => ['required'],
        ]);

        $user = User::find(Auth::id());

        $ronde = Rondes::create([
            'pseudo' => $user->pseudo,
            'description' => $request->description,
        ]);

        event(new RondeAdded($ronde));

        // Send response
        $response = [
            'error' => false,
            'message' => "Succes",
            'ronde' => $ronde,
        ];

        return response($response, 201);
    }
}
