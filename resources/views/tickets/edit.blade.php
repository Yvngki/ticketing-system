{{-- @extends('tickets.layout') --}}
@extends('layouts.app')

@section('title', 'Edit Ticket')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

@section('content')
<div class="container mt-4">
    <div class="row">
        {{-- <div class="col-2"></div> --}}
        <div class="col-8">
          <a class="btn" href="{{ route('admin-home') }}">Home</a>
          <a class="btn" href="{{ route('tickets.index') }}">Tickets</a>
          <a class="btn" href="{{ route('tickets.create') }}">create</a>
        </div>
    </div>
    <h2>Edit Ticket</h2>
    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Add your form fields for editing the ticket -->
        <div class="form-group">
            <label for="event_name">Event Name:</label>
            <input type="text" class="form-control" id="event_name" name="event_name" value="{{ $ticket->event_name }}" required>
        </div>

        <div class="form-group">
            <label for="ticket_type">Ticket Type:</label>
            <input type="text" class="form-control" id="ticket_type" name="ticket_type" value="{{ $ticket->ticket_type }}" required>
        </div>

        <div class="form-group">
            <label for="ticket_price">Ticket Price:</label>
            <input type="number" class="form-control" id="ticket_price" name="ticket_price" value="{{ $ticket->ticket_price }}" required>
        </div>

        <div class="form-group">
            <label for="ticket_quantity">Ticket Quantity:</label>
            <input type="number" class="form-control" id="ticket_quantity" name="ticket_quantity" value="{{ $ticket->ticket_quantity }}" required>
        </div>

        <div class="form-group">
            <label for="event_date">Event Date:</label>
            <input type="date" class="form-control" id="event_date" name="event_date" value="{{ $ticket->event_date }}" required>
        </div>

        <div class="form-group">
            <label for="event_location">Event Location:</label>
            <input type="text" class="form-control" id="event_location" name="event_location" value="{{ $ticket->event_location }}" required>
        </div>

        <!-- Add more form fields as needed -->

        <button type="submit" class="btn btn-primary">Update Ticket</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
