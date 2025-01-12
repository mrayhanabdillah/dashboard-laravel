<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voting;
use App\Models\Programs;
use App\Models\PaymentTicket;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $programs = Programs::where('is_active',1)->get();
        $pendingVote = Voting::where('state','pending')->get();
        $payments = PaymentTicket::where('state',1)->get();
        $voting = Voting::all();
        $pendapatanTotal = 0;
        $pendapatanHarian = 0;
        $nowTargetVote = 0;
        $totalTargetVoting = 0;
        $percent = 0;
        foreach($voting as $data){
            if($data->state == 'success' && $data->programs->is_active == 1){
                $pendapatanTotal += $data->voteType->price;
                $nowTargetVote += $data->voteType->point + $data->voteType->bonus_point;

            }
            if ($data->state == 'success' && $data->created_at->isToday()) {
                $pendapatanHarian += $data->voteType->price;
            }
        }
        foreach($payments as $payment){
            if($payment->state == 1){
                $pendapatanTotal += $payment->tickets->price;
            }
            if($payment->state == 1 && $payment->created_at->isToday()){
                $pendapatanHarian += $payment->tickets->price;
            }

        }
        foreach($programs as $program){
            $totalTargetVoting += $program->target_vote;
        }
        if(count($programs) != 0 ){
            $percent = round(($nowTargetVote / $totalTargetVoting) * 100,2);
        }



        return view('dashboard',compact('programs','pendapatanTotal','pendapatanHarian','percent','pendingVote'));
    }
}
