@extends('layouts.app')
@section('title')
   Result of search
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header mb-3">Your Dashboard</div>
                    <div class="d-flex p-3" style="justify-content: space-between">
                        <a href="{{ url('/show/'.Auth::user()->id) }}" style="color: white;font-weight: bold;text-decoration: none" class="card mb-3 bg-primary w-25" >Tickets</a>
                        <a href="{{ url('/') }}" style="color: white;font-weight: bold;text-decoration: none" class="card mb-3 bg-danger w-25" >Home Page</a>
                        <a href="{{ url('/ticket') }}" style="color: white;font-weight: bold;text-decoration: none" class="card mb-3 bg-dark w-25" >Create Ticket</a>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">Result of search</h2>
                    {{--      Notification of Done           --}}
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    {{--     show the admin tickets           --}}
                        <table class="table table-sm table-dark">
                            <thead>
                                <tr>
                                        <th scope="col">Ticket ID</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Operations</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach($tickets as $ticket)
                                    <tr>
                                        <td>{{ $ticket->id}}</td>
                                        <td>{{ $ticket->deadline }}</td>
                                        <td>{{ $ticket->status }}</td>
                                        <td>
                                            <a href="{{ url('edit/'.$ticket->id)}}" class="mx-2 p-2" style="color: green"><i class="fa fa-2x fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a href="{{ url('delete/'.$ticket->id)}}" class="mx-2 p-2" style="color: red"><i class="fa fa-2x fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    {{--    end of show the admin tickets      --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
