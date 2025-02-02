<?php

namespace App\Http\Controllers;

use App\Models\Ballon;
use Illuminate\Http\Request;
use Inertia\Inertia;


class BallonController extends Controller
{
    public function index(Request $request): \Inertia\Response
    {
        if ($request->user()->role=='admin'){
            $ballons = Ballon::orderBy('pilot_id', 'desc')->get();
        } else {
            $ballons = Ballon::where(['pilot_id' => $request->user()->id])->orderBy('id', 'desc')->get();
        }

        return Inertia::render('Ballons/Index', [
            'ballons' => $ballons,
            'user' => $request->user()
        ]);
    }

    public function create()
    {
        return Inertia::render('Ballons/Edit', [
            'ballon' => new Ballon()
        ]);
    }

    public function store(Request $request)
    {
        Ballon::create($request->all());
    }


    public function update($id, Request $request)
    {
        $payload = [
            'name' => $request->name,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'pilot_id' => $request->user()->id,
        ];
        
        if (empty($id)) {
            Ballon::create($payload);
        } else {
            $ballon = Ballon::findOrFail($id);
            $ballon->update($payload);
        }

        return redirect()->route('ballons.index')
            ->with('success', 'Ballon updated successfully.');
    }


    public function destroy(Request $request)
    {
        Ballon::destroy($request->id);
    }

    public function getBallon($id)
    {
        $ballon = Ballon::find($id);

        if (!$ballon) {
            abort(404, 'Ballon not found');
        }

        return Inertia::render('Ballons/Edit', [
            'ballon' => $ballon
        ]);
    }
}
