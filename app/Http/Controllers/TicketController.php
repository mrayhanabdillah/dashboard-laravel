<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\PaymentTicket;
use App\Models\Programs;
use App\Models\Guest;
use Illuminate\Support\Facades\Mail;
use App\Mail\BuyTicket;
use App\Mail\ValidPayment;
use Illuminate\Support\Facades\Storage;

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

    public function buy(Request $request,$id){

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:10,15',
            'ticket_id' => 'required',
            'proof_payments' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('proof_payments')) {
            $file = $request->file('proof_payments');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads/bukti_bayar', $filename);
        }

        $program = Programs::find($id);  // Pastikan $id adalah ID dari program yang sedang dicari
        $ticket = Ticket::find($request->ticket_id);
        $validated['program_id'] = $id;
        $validated['amount'] = $ticket->amount + $ticket->bonus;
        $validated['program_name'] = $program->name;  // Tambahkan nama program ke array data
        $validated['proof_payments'] = $filename;

        PaymentTicket::create($validated);

        // Kirim email dengan data yang diperbarui
        Mail::to($request->email)->send(new BuyTicket($validated));

        Alert::toast('Terima kasih sudah membeli tiket!', 'success');
        return redirect()->back();

    }

    public function newPayment(){
        $payments = PaymentTicket::where('state',0)->get();
        return view('admin.ticket.ticket_baru',compact('payments'));
    }
    public function validPayment(){
        $payments = PaymentTicket::where('state',1)->get();
        return view('admin.ticket.ticket_baru',compact('payments'));
    }

    public function detailTiketBaru ($id){
        $payment = PaymentTicket::find($id);
        return view('admin.ticket.ticket_validate',compact('payment'));
    }

    public function destroy($id)
    {
        $payment = PaymentTicket::find($id);
        Storage::delete('public/uploads/bukti_bayar/' . $payment->proof_payments);
        PaymentTicket::destroy($id);
        Alert::toast('Pembayaran Tidak Valid!', 'success');
        return redirect()->route('new-tiket');
    }

    public function validatePayment($id){
        $payment = PaymentTicket::findOrFail($id);
        $payment->state = 1;
        $payment->save();
        $length = 7;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $username = substr(str_shuffle($characters), 0, $length);
        $password = substr(str_shuffle($characters), 0, $length);
        $guest = New Guest;
        $guest->payment_id = $id;
        $guest->username = $username;
        $guest->password = $password;
        $guest->save();
        $data = [
            "name" => $payment->name,
            "program" => $payment->program->name,
            "username" => $username,
            "password" => $password,
        ];
        Mail::to($payment->email)->send(new ValidPayment($data));
        Alert::toast('Pembayaran Berhasil diValidasi!', 'success');
        return redirect()->route('new-tiket');

    }
}
