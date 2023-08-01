<?php
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseTicketController extends Controller
{
    // Display the form to buy a ticket
    public function showBuyForm()
    {
        $tickets = Ticket::all();
        return view('buy-ticket', compact('tickets'));
    }

    // Process the ticket purchase
    public function purchaseTicket(Request $request)
    {
        $ticketId = $request->input('ticket_id');

        // Find the ticket by its ID
        $ticket = Ticket::find($ticketId);

        // Check if the ticket exists
        if (!$ticket) {
            return redirect()->route('tickets.buy')
                ->with('error', 'Ticket not found');
        }

        // Create a new purchase record for the user
        $purchase = new Purchase();
        $purchase->user_id = Auth::id();
        $purchase->ticket_id = $ticket->id;
        $purchase->save();

        return redirect()->route('home')
            ->with('success', 'Ticket purchased successfully');
    }
}
