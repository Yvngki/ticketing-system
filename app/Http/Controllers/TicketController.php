<?php

namespace App\Http\Controllers;

use App\Models\tickets;
use Illuminate\Http\Request;

use App\Models\Ticket;
// use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the tickets.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tickets = Ticket::all();
        // dd($tickets);
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form to create a new ticket.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created ticket in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_name' => 'required|string',
            'ticket_type' => 'required|string',
            'ticket_price' => 'required|numeric',
            'ticket_quantity' => 'required|integer|min:1',
            'event_date' => 'required|date',
            'event_location' => 'required|string',
            // Add more validation rules for additional fields as needed
        ]);

        Ticket::create($validatedData);

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    /**
     * Show the form to edit a ticket.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\View\View
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified ticket in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\RedirectResponse
     */


    public function buyTicket($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return Redirect::back()->with('error', 'Ticket not found');
        }

        // Create a new purchase record for the user
        $purchase = new Purchase();
        $purchase->user_id = Auth::id();
        $purchase->ticket_id = $ticket->id;
        $purchase->save();

        return Redirect::route('home')->with('success', 'Ticket purchased successfully');
    }
    public function update(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'event_name' => 'required|string',
            'ticket_type' => 'string',
            'ticket_price' => 'required|numeric',
            'ticket_quantity' => 'required|integer|min:1',
            'event_date' => 'required|date',
            'event_location' => 'required|string',
            // Add more validation rules for additional fields as needed
        ]);

        $ticket->update($validatedData);

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
    }
    public function destroy($id)
    {
        // Find the ticket by its ID
        $ticket = Ticket::find($id);

        // Check if the ticket exists
        if (!$ticket) {
            return redirect()->route('tickets.index')
                ->with('error', 'Ticket not found'); // Redirect back with an error message
        }

        // Delete the ticket
        $ticket->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket deleted successfully'); // Redirect back with a success message
    }
    
}
