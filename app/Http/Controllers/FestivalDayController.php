<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FestivalDay;
use Carbon\Carbon;
use Inertia\Inertia;


class FestivalDayController extends Controller
{
    public function index(Request $request): \Inertia\Response
    {
        $festivalDays = FestivalDay::all();
        
        return Inertia::render('FestivalDays/Index', [
            'festivalDays' => $festivalDays

        ]);
    }

    public function create()
    {
        $availableStatuses = ['active', 'canceled'];

        return Inertia::render('FestivalDays/Edit', [
            'festivalDay' => new FestivalDay(),
            'availableStatuses' => $availableStatuses
        ]);
    }

    public function store(Request $request)
    {
        FestivalDay::create($request->all());
    }

    public function update($id, Request $request)
    {
        $payload = [
            'date' => Carbon::parse($request->date)->format('Y-m-d'),
            'description' => $request->description,
            'status' => $request->status,
        ];

        if (empty($id)) {
            FestivalDay::create($payload);
        } else {
            $festivalDay = FestivalDay::findOrFail($id);
            $festivalDay->update($payload);
        }

        return redirect()->route('festival_days.index')
            ->with('success', 'FestivalDay updated successfully.');
    }


    public function destroy(Request $request)
    {
        FestivalDay::destroy($request->id);
    }

    public function getFestivalDay($id)
    {
        $festivalDay = FestivalDay::find($id);
        $availableStatuses = ['active', 'canceled'];

       
        if (!$festivalDay) {
                abort(404, 'Festival day not found');
        }
        
        return Inertia::render('FestivalDays/Edit', [
            'festivalDay' => $festivalDay,
            'availableStatuses' => $availableStatuses,
        ]);
    }

}