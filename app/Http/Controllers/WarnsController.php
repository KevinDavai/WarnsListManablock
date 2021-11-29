<?php

namespace App\Http\Controllers;

use App\Models\Warns;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Events\WarnAdded;
use App\Models\Warns_type;

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
        $warns = Warns::orderBy('created_at', 'desc')->paginate(7);
        return response()->json($warns);
    }

    public function getListTypeWarns()
    {
        $typeWarns = Warns_type::all();
        return response()->json($typeWarns);
    }

    public function postWarn(Request $request)
    {
        $request->validate([
            'pseudo' => ['required'],
            'description' => ['string', 'nullable'],
            'warn' => ['required', 'string'],
            'moderateur' => ['required'],
        ]);

        if($request->description == null) 
            $request->description = "Aucune";

        $warn = Warns::create([
            'pseudo' => $request->pseudo,
            'description' => $request->description,
            'warn_name' => $request->warn,
            'moderateur' => $request->moderateur,
        ]);

        event(new WarnAdded($warn));

        // Send response
        $response = [
            'error' => false,
            'message' => "Succes",
            'warn' => $warn,
        ];

        return response($response, 201);
    }
}
