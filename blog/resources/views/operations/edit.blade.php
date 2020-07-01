@extends('layouts.app')
@section('title')
    Edit ticket
    @endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex p-3 text-center" style="justify-content: space-between">
                    <a href="{{ url('/show/'.Auth::user()->id) }}" style="color: white;font-weight: bold;text-decoration: none" class="card mb-3 bg-primary w-25" >Tickets</a>
                    <a href="{{ url('/') }}" style="color: white;font-weight: bold;text-decoration: none" class="card mb-3 bg-danger w-25" >Home Page</a>
                    <a href="{{ url('/ticket') }}" style="color: white;font-weight: bold;text-decoration: none" class="card mb-3 bg-dark w-25" >Create Ticket</a>
                </div>
                <h1 class="alert alert-primary alert-block p-2 text-center">Edit Ticket</h1>
                @if (session()->get('success'))
                    <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
                @endif
                    <form method="POST" action="{{url('/update/'.$tickets->id)}}">
                        @csrf
                        <div class="form-group">
                            <label>Choose Deadline</label>
                            <input type="date" class="form-control"  value="{{$tickets->deadline}}" name="deadline" required >
                        </div>

                        <div class="form-group">
                            <label>Status of Ticket</label>
                            <select type="email" class="form-control" value="{{$tickets->status}}" name="status"  required>
                                <option value="open">Open</option>
                                <option value="close">Close</option>
                            </select>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-block">Edit</button>
                    </form>

            </div>
        </div>
    </div>
@endsection
