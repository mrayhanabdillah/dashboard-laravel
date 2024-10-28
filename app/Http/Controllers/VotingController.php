<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voting;
use App\Models\VoteType;
use App\Models\Participants;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use DataTables;
Use Alert;

class VotingController extends Controller
{
    public function votingBaru(Request $request){
        $votings = Voting::where('state','pending')->get();
        return view('admin.voting.voting',compact('votings'));
    }
    public function votingValid(Request $request){
        $votings = Voting::where('state','success')->get();
        return view('admin.voting.voting',compact('votings'));
    }

    public function store(Request $request){
        try {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric|digits_between:10,15',
                'participant_id' => 'required',
                'voteType_id' => 'required',
                'proof_payment' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($request->hasFile('proof_payment')) {
                $file = $request->file('proof_payment');
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/uploads/bukti_bayar', $filename);
            }
            $program = Participants::where('id',$request->participant_id)->first();
            $validated['program_id'] = $program->program->id;
            $validated['proof_payment'] = $filename;
            Voting::create($validated);
            Mail::to('pbgarena081@gmail.com')->send(new TestMail($validated));
            Alert::toast('Voting Created Successfully!', 'success');
            return redirect()->back();
        } catch (ValidationException $e) {
            Alert::error('Error Title', $e->errors());
            return redirect()->route('create-voting')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return redirect()->route('create-voting')->withErrors(['An error occurred while creating the party.']);
        }
    }

    public function destroy($id)
    {
        Voting::destroy($id);
        Alert::toast('Voting Deleted Successfully!', 'success');
        return redirect()->route('voting-baru');
    }

    public function validateIndex($id){
        $voting = Voting::find($id);
        return view('admin.voting.validasi_voting',compact('voting'));
    }

    public function validate_voting($id){
        $voting = Voting::findOrFail($id);
        $voting->state = 'success';
        $voting->participant->votes = $voting->participant->votes + $voting->voteType->point + $voting->voteType->bonus_point;
        $voting->save();
        $voting->participant->save();
        Alert::toast('Voting Berhasil Divalidasi!', 'success');
        return redirect()->route('voting-valid');

    }


}


