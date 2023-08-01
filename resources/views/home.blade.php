@extends('layouts.app')

@section('content')
   {{-- "{{ $ticket = Ticket::all();}}" --}}
    
    <div class="container">
      
            <div class="row"> 
                <div class="col-4"> <h4>Welcome, {{ Auth::user()->name }}</h4></div>                                                                               <div class="col"></div>
                <div class="col-4">
                  <a class="btn" href="{{ route('home') }}">Home</a>
                  <a class="btn" href="{{ route('buy') }}">Tickets</a>                  
                </div>              
            </div>

            {{-- <div class="card-header">{{ __('Event Tickets') }}</div> --}}
            <!-- Add the tickets table here -->                        
                  
        <div class="container mt-4">
            {{-- <h2>Buy Ticket</h2> --}}
            {{-- <form method="post" action="{{ route('tickets.purchase') }}">
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
        </div> --}}
        {{-- <table class="table">
            <thead>  
                 <h2>Tickets List</h2>               
                <tr>                    
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Ticket Type</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Event Date</th>
                    <th>Event Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()-> $tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->event_name }}</td>
                        <td>{{ $ticket->ticket_type }}</td>
                        <td>{{ $ticket->ticket_price }}</td>
                        <td>{{ $ticket->ticket_quantity }}</td>
                        <td>{{ $ticket->event_date }}</td>
                        <td>{{ $ticket->event_location }}</td>
                        <td>
                         
                            
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this ticket?')">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                       
                            <!-- Add delete functionality if needed -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
       
        <h3>Your Purchased Tickets</h3>
        <ul>
            @foreach (Auth::user()->purchases as $purchase)
       <div class="card">
            <div class="card-header h3">Event Name:  {{ $purchase->ticket->event_name }}</div>
               <div class="card-body px-3">
                    <li style="list-style:none"> {{ 'Ticket Type: ' . $purchase->ticket->ticket_type }}</li>
                    <li style="list-style:none"> {{ 'Price: ' . 'zmk' . $purchase->ticket->ticket_price }}</li>
                    <li style="list-style:none"> {{ 'Location: ' . $purchase->ticket->event_location }}</li>
                    <li style="list-style:none"> {{ 'Date: ' . $purchase->ticket->event_date }}</li>
               </div>
            </div>
            @endforeach
        </ul>
    </div>


@endsection
