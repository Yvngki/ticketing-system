<!-- resources/views/buy-ticket.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Buy Ticket</h2>
        <form method="post" action="{{ route('tickets.purchase') }}">
            @csrf
            <div class="form-group">
                <label for="ticket_id">Select Ticket:</label>
                <select class="form-control" id="ticket_id" name="ticket_id">
                    @foreach ($tickets as $ticket)
                        <option value="{{ $ticket->id }}">{{ $ticket->event_name }} - {{ $ticket->ticket_type }} (${{ $ticket->ticket_price }})</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Buy Ticket</button>
        </form>
    </div>
@endsection
