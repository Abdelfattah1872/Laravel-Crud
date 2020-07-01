@extends('layouts.app')
@section('title')
    Your Tickets
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header mb-3">Your Dashboard</div>
                    <div class="d-flex p-3" style="justify-content: space-between">
                        <a href="{{ url('/') }}" style="color: white;font-weight: bold;text-decoration: none" class="card mb-3 bg-danger w-25" >Home Page</a>
                        <a href="{{ url('/ticket') }}" style="color: white;font-weight: bold;text-decoration: none" class="card mb-3 bg-dark w-25" >Create Ticket</a>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">Tickets</h2>
                    {{--      Notification of Done           --}}
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    {{--      search button                  --}}
                    <form action="{{url('search/')}}" method="GET" class="w-25 ml-auto" >
                        <div class="input-group">
                            <input type="date" class="form-control bg-warning" name="search">
                                 <span class="input-group-prepend">
                                    <button type="submit" class="btn btn-danger">Search</button>
                                </span>
                        </div>
                    </form>
                    {{--     end search button                --}}

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

                    {{--                     Loop on users                --}}
                            @foreach($user as $user)
                                    {{--                     every admin show his own tickets only                --}}
                                @if(Auth::user()->id == $user->id)
                                    {{--                     get all tickets for this user                --}}
                                    @foreach($user->tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->id}}</td>
                                            <td>{{ $ticket->deadline }}</td>
                                            <td style="color: green">{{ $ticket->status }}</td>
                                            <td>
                                                <a href="{{ url('edit/'.$ticket->id)}}" class="mx-2 p-2" style="color: green"><i class="fa fa-2x fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <a href="{{ url('delete/'.$ticket->id)}}" class="mx-2 p-2" style="color: red"><i class="fa fa-2x fa-trash-o" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                            @endif
                           @endforeach
                        </table>
                    {{--    end of show the admin tickets     --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
