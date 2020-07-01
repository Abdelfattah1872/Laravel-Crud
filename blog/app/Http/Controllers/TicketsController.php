<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;
use Illuminate\Support\Facades\DB;


class TicketsController extends Controller
{
    public function create(){
        $users = User::all();
        return view('ticket',compact('users'));
    }

    public function store(Request $request){
    $ticket = new Ticket;
    $ticket->user_id = $request->user_id;
    $ticket->deadline = $request->deadline;
    $ticket->status = $request->status;
    $request->session()->flash('success',"Thank You :)");
        $ticket->save();
    return back();
    }

    public function edit($id){
        $tickets=Ticket::findOrfail($id);
        return view('operations.edit',compact('tickets'));
    }


    public function update($id){
        $ticket=Ticket::findOrfail($id);
        $ticket->user_id = $ticket->user_id;
        $ticket->deadline = request('deadline');
        $ticket->status = request('status');
        session()->flash('success',"Thank You :) -updated");
        $ticket->save();
        return back();
    }
    public function delete($id){
        $ticket = Ticket::find($id);
        $ticket->delete();
        return back();
    }

    public function search(Request $request){
            $search =  $request->get('search');
            $tickets= Ticket::where('deadline','=' , $search)->get();
            return view('search',compact('tickets'));
    }
}
