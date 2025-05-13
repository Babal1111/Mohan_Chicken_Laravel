<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('table')->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $tables = Table::all();
        return view('reservations.create', compact('tables'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'table_id' => 'required|exists:tables,id',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',
            'guests' => 'required|integer|min:1',
        ]);
        Reservation::create([
            'user_id' => Auth::id(),
            'table_id' => $validated['table_id'],
            'reservation_date' => $validated['reservation_date'],
            'reservation_time' => $validated['reservation_time'],
            'guests' => $validated['guests'],
            'status' => 'pending',
        ]);
        return redirect()->route('reservations.index')->with('success', 'Reservation placed!');
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $tables = Table::all();
        return view('reservations.edit', compact('reservation', 'tables'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'table_id' => 'required|exists:tables,id',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',
            'guests' => 'required|integer|min:1',
            'status' => 'required|string',
        ]);
        $reservation->update($validated);
        return redirect()->route('reservations.index')->with('success', 'Reservation updated!');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted!');
    }
}
