<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoteType;
Use Alert;

class VoteTypeController extends Controller
{
    public function index(){
        $voteTypes = VoteType::all();
        return view('admin.vote_type.vote_type',compact('voteTypes'));
    }

    public function create(){
        return view('admin.vote_type.create_vote_type');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'price'=> 'required',
            'point'=> 'required',
            'bonus_point'=> 'required',
        ]);
        if($validated){
            VoteType::create($validated);
            Alert::toast('Pembuatan Paket Vote Berhasil!', 'success');
            return redirect()->route('vote-types');
        }else{
            Alert::error('Error Title', 'Error Message');
            return redirect()->route('create-vote-types');
        }
    }

    public function active($id)
    {
        $vote_type = VoteType::findOrFail($id);
        if($vote_type->is_active == 0){
            $vote_type->is_active = 1;
            Alert::toast('Paket Vote Aktif!', 'success');
        }elseif($vote_type->is_active == 1){
            $vote_type->is_active = 0;
            Alert::toast('Paket Vote Non-Aktif!', 'success');
        }
        $vote_type->save();
        return redirect()->route('vote-types');
    }
}
