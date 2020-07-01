@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header mb-3 bg-success">Thank you :)</div>
                <div class="d-flex p-3" style="justify-content: space-between">
                    <a href="{{ url('/show/'.Auth::user()->id) }}" style="color: white;font-weight: bold;text-decoration: none" class="card mb-3 bg-primary w-25" >Tickets</a>
                    <a href="{{ url('/ticket') }}" style="color: white;font-weight: bold;text-decoration: none" class="card mb-3 bg-dark w-25" >Create Ticket</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
