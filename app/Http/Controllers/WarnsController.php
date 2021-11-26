<?php

namespace App\Http\Controllers;

use App\Models\Warns;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Events\WarnAdded;

class WarnsController extends Controller
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

    public function getListWarns()
    {
        $warns = Warns::all();
        return response()->json($warns);
    }

    public function postWarn(Request $request)
    {
        $request->validate([
            'pseudo' => ['required'],
            'description' => ['required', 'string'],
            'warn' => ['required', 'string'],
            'moderateur' => ['required'],
        ]);

        $warn = Warns::create([
            'pseudo' => $request->pseudo,
            'description' => $request->description,
            'warn' => $request->warn,
            'moderateur' => $request->moderateur,
        ]);

        event(new WarnAdded());

        // Send response
        $response = [
            'error' => false,
            'message' => "Succes",
            'warn' => $warn,
        ];

        return response($response, 201);
    }
}
