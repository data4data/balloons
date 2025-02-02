<?php

namespace App\Http\Controllers;

use App\Models\Ballon;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\FestivalDay;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class BookingController extends Controller
{
    public function index(Request $request): \Inertia\Response
    {
        if ($request->user()->role=='admin'){
            $bookings = Booking::with(['customer', 'ballon', 'festivalDay'])->orderBy('customer_id', 'desc')->get();
        } else {
            $bookings = Booking::with(['customer', 'ballon', 'festivalDay'])->where(['customer_id' => $request->user()->id])->orderBy('id', 'desc')->get();
        }

        return Inertia::render('Bookings/Index', [
            'bookings' => $bookings,
            'user' => $request->user(),
        ]);
    }
    
    public function create()
    {
        $availableBalloons = Ballon::all();
        $availableFestivalDays = FestivalDay::all();

        return Inertia::render('Bookings/Create', [
            'availableBalloons' => array_column($availableBalloons->toArray(), 'name', 'id'),
            'availableFestivalDays' => array_column($availableFestivalDays->toArray(), 'date', 'id'),
        ]);
    }

    public function save(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Booking::create([
            'customer_id' => $user->id,
            'balloon_id' => $request->balloon_id,
            'festival_day_id' => $request->festival_day_id,
            'special_requests'=> $request->special_requests,
            'people_count' => $request->people_count,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    public function store(Request $request)
    {
        Booking::create($request->all());
    }

    public function update($id, Request $request)
    {
        $payload = [
            'customer_id' => $request->user()->id,
            'balloon_id' => $request->balloon_id,
            'festival_day_id' => $request->festival_day_id,
            'special_requests'=> $request->special_requests,
            'people_count' => $request->people_count,
        ];
        if (empty($id)) {
            Booking::create($payload);
        } else {
            $booking = Booking::findOrFail($id);
            $booking->update($payload);
        }

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    public function getBooking($id, Request $request)
    {
        if (in_array($request->user()->role, ['admin', 'user'])){
            $availableBalloons = Ballon::all();
        }else {
            $availableBalloons = Ballon::where(['pilot_id' => $request->user()->id])->get();
        }
        
        $availableFestivalDays = FestivalDay::where(['status' => 'active'])->get();
        $booking = Booking::find($id);
        
        return Inertia::render('Bookings/Edit', [
            'booking' => $booking,
            'availableBalloons' => array_column($availableBalloons->toArray(), 'name', 'id'),
            'availableFestivalDays' => array_column($availableFestivalDays->toArray(), 'date', 'id'),
        ]);
    }

    public function createInList(Request $request)
    {
        if (in_array($request->user()->role, ['admin', 'user'])){
            $availableBalloons = Ballon::all();
        }else {
            $availableBalloons = Ballon::where(['pilot_id' => $request->user()->id])->get();
        }

        $availableFestivalDays = FestivalDay::where(['status' => 'active'])->get();
        
        return Inertia::render('Bookings/Edit', [
            'booking' => new Booking(),
            'availableBalloons' => array_column($availableBalloons->toArray(), 'name', 'id'),
            'availableFestivalDays' => array_column($availableFestivalDays->toArray(), 'date', 'id'),
        ]);
    }

    public function destroy(Request $request)
    {
        Booking::destroy($request->id);
    }

}
