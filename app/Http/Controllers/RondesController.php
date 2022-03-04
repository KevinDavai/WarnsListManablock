<?php

namespace App\Http\Controllers;

use App\Models\Rondes;
use Inertia\Inertia;
use App\Events\RondeAdded;
use Illuminate\Http\Request;

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
        $rondes = Rondes::orderBy('created_at', 'desc')->paginate(7);
        return response()->json($rondes);
    }

    public function postRonde(Request $request)
    {
        $request->validate([
            'description' => ['string', 'required'],
            'pseudo_moderator' => ['required'],
        ]);

        $ronde = Rondes::create([
            'pseudo' => $request->pseudo_moderator,
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
