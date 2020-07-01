@extends('layouts.app')
@section('title')
    Add New Ticket
@endsection
@section('content')
    <div class="container">
        <div class="d-flex p-3 text-center" style="justify-content: space-between">
            <a href="{{ url('/show/'.Auth::user()->id) }}" style="color: white;font-weight: bold;text-decoration: none" class="card mb-3 bg-primary w-25" >Tickets</a>
            <a href="{{ url('/') }}" style="color: white;font-weight: bold;text-decoration: none" class="card mb-3 bg-danger w-25" >Home Page</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="alert alert-primary alert-block p-2 text-center">Create new Ticket</h1>
                @if (session()->get('success'))
                    <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
                @endif
                <form method="POST" action="{{url('/store')}}">
                    <div class="form-group">
                        @csrf
                    {{--        choose admin field                    --}}
                        <label>Choose admin to Assign</label>
                        <select class="form-control" name="user_id"  required>
                    {{--        loop on user to Assign ticket data                    --}}
                        @foreach($users as $usrs)
                            <option value="{{$usrs->id}}">{{$usrs->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    {{--        Choose Deadline field                    --}}
                    <div class="form-group">
                        <label>Choose Deadline</label>
                        <input type="date" class="form-control"  name="deadline" id="exampleInputdate" required>
                    </div>
                    {{--        Choose Status of Ticket field                    --}}
                    <div class="form-group">
                        <label>Status of Ticket</label>
                        <select type="email" class="form-control" name="status" required >
                            <option value="open">Open</option>
                            <option value="close">Close</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
