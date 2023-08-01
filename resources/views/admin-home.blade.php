@extends('layouts.app')
{{-- @extends('admin.layout') --}}

@section('content')

   

           
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                
          
                        <div class="container">
                            
                            <div class="row">
                              <div class="col-4"><h2>Admin Home</h2></div>                                                                                    {{-- <div class="col"></div> --}}
                                <div class="col-4">
                                  <a class="btn" href="{{ route('admin-home') }}">Home</a>
                                  <a class="btn" href="{{ route('tickets.index') }}">Tickets</a>
                                  <a class="btn" href="{{ route('tickets.create') }}">Create</a>
                                </div>   
                                <div class="col-4">  <a class="btn btn-primary" href="{{ route('tickets.index') }}">Manage Tickets</a></div>                  
                            </div>

                            {{-- <div class="card-header">{{ __('Event Tickets') }}</div> --}}
                            <!-- Add the tickets table here -->                        
                          
                        </div>                
                    
@endsection
