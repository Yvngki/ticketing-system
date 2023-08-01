@extends('layouts.app')
{{-- @extends('admin.layout') --}}

@section('title', 'Tickets List')

@section('content')
 
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
    <div class="container mt-4">
        <div class="row">
            {{-- <div class="col-2"></div> --}}
            <div class="col-8">
              <a class="btn" href="{{ route('admin-home') }}">Home</a>
              <a class="btn" href="{{ route('tickets.index') }}">Tickets</a>
              <a class="btn" href="{{ route('tickets.create') }}">create</a>
            </div>
        </div>
        <table class="table">
            <thead>  
                 <h2>Tickets List</h2>
                 <a class="btn btn-primary" href="{{ route('tickets.create') }}">Add Event</a>
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
                @foreach ($tickets as $ticket)
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
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
