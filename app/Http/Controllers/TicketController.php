<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Alert;

class TicketController extends Controller
{
    public function index() {
        $tickets = Ticket::all();
        return view('admin.ticket.ticket',compact('tickets'));
    }

    public function create(){
        return view('admin.ticket.create_ticket');
    }

    public function store(Request $request){
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required',
                'amount' => 'required',
                'bonus' => 'required',
            ]);
            Ticket::create($validated);
            Alert::toast('Pembuatan Tiket Berhasil!', 'success');
            return redirect()->route('tickets');
        } catch (ValidationException $e) {
            Alert::error('Error Title', $e->errors());
            return redirect()->route('tickets-create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return redirect()->route('tickets-create')->withErrors(['An error occurred while creating the party.']);
        }
    }
}
