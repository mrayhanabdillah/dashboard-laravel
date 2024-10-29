<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voting;
use App\Models\Programs;
use App\Models\Participants;
use Illuminate\Validation\ValidationException;

Use Alert;



class ParticipantController extends Controller
{
    public function index($id){
        $program = Programs::findOrFail($id);
        return view('admin.participants.participants_program',compact('program'));
    }

    public function create($id){
        $program = Programs::findOrFail($id);
        return view('admin.participants.create_participant_program',compact('program'));
    }

    public function store(Request $request,$id){

        $validated = $request->validate([
            'name' => 'required',
            'pob' => 'required',
            'dob' => 'required',
            'origin' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = uniqid() . '_' . $file->getClientOriginalName(); // Buat nama file unik
            $file->storeAs('public/uploads/participants', $filename);
        }
        $participant = New Participants;
        $participant->program_id = $id;
        $participant->name = $request->name;
        $participant->dob = $request->dob;
        $participant->pob = $request->pob;
        $participant->origin = $request->origin;
        $participant->description = $request->description;
        $participant->photo = $filename;
        $participant->save();
        Alert::toast('Berhasil Menambahkan Peserta!', 'success');
        return redirect()->route('participants-program',$id);


    }
}
