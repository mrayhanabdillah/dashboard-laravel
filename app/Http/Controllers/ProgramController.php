<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programs;
use App\Models\VoteType;
use App\Models\Voting;
use App\Models\Ticket;
use Illuminate\Validation\ValidationException;
use DataTables;
Use Alert;

class ProgramController extends Controller
{
    public function programIndex($id){
        $program = Programs::find($id);
        $voteTypes = VoteType::where('is_active',1)->get();
        $tickets = Ticket::all();
        return view('vote',compact('program','voteTypes','tickets'));
    }

    public function index(Request $request){
        $programs = Programs::all();
        return view('admin.program.program',compact('programs'));
    }

    public function dashboard($id){
        $program = Programs::find($id);
        $pendingVote = Voting::where('state','pending')->where('program_id',$id)->get();
        $voting = Voting::where('program_id',$id)->get();
        $pendapatanTotal = 0;
        $pendapatanHarian = 0;
        $nowTargetVote = 0;
        foreach($voting as $data){
            if($data->state == 'success'){
                $pendapatanTotal += $data->voteType->price;
                $nowTargetVote += $data->voteType->point + $data->voteType->bonus_point;
            }
            if ($data->state == 'success' && $data->created_at->isToday()) {
                $pendapatanHarian += $data->voteType->price;
            }
        }

        $percent = round(($nowTargetVote / $program->target_vote) * 100,2);
        return view('admin.program.dashboard', compact('program','pendapatanTotal','pendapatanHarian','percent','pendingVote'));
    }

    public function create(){
        return view('admin.program.create_program');
    }

    public function store(Request $request){
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'location' => 'required',
                'date_program' => 'required',
                'time_program' => 'required',
                'open_vote' => 'required',
                'close_vote' => 'required',
                'target_vote' => 'required',
                'description' => 'required|string',
            ]);
            Programs::create($validated);
            Alert::toast('Pembuatan Program Berhasil!', 'success');
            return redirect()->route('program');
        } catch (ValidationException $e) {
            Alert::error('Error Title', $e->errors());
            return redirect()->route('create-program')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return redirect()->route('create-program')->withErrors(['An error occurred while creating the party.']);
        }
    }

    public function update(Request $request, $id){
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'location' => 'required',
                'date_program' => 'required',
                'time_program' => 'required',
                'open_vote' => 'required',
                'close_vote' => 'required',
                'target_vote' => 'required',
                'description' => 'required|string',
            ]);
            $program = Programs::find($id);
            $program->update($validated);
            Alert::toast('Update Program Berhasil!', 'success');
            return redirect()->back();
        } catch (ValidationException $e) {
            Alert::error('Error Title', $e->errors());
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error Title', 'Error Message');
            return redirect()->back();
        }
    }

    public function destroy($uuid)
    {
        try{
            Programs::destroy($uuid);
            Alert::toast('Menghapus Program Berhasil!', 'success');
        }catch(ValidationException $e){
            Alert::toast('Menghapus Program Berhasil!', 'error');
        }catch (\Exception $e) {
            Alert::error('Menghapus Gagal!', 'Program ini sudah memiliki peserta jadi tidak dapat dihapus. lebih baik jika ingin menghilangkan dinon-aktifkan saja.');
        }

        return redirect()->route('program');
    }
    public function active($uuid)
    {
        $program = Programs::findOrFail($uuid);
        if($program->is_active == 0){
            $program->is_active = 1;
            Alert::toast('Program Aktif!', 'success');
        }elseif($program->is_active == 1){
            $program->is_active = 0;
            Alert::toast('Program Non-Aktif!', 'success');
        }
        $program->save();
        return redirect()->route('program');
    }
}
