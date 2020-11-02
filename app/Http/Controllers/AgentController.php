<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\RefTranstype;
use App\User;
use App\TblTransactions;
use App\TblAccPoints;

class AgentController extends Controller
{
    public function getAgentList() {
        $query = User::with('accountType')
        ->with('accoutPoints')
        ->where([['acc_inv', '=',  Auth::id()], ['acc_type', '<>', 4]])
        ->get();

        return $query;
    }
    
    public function updateStatus($id, $stat){
        
        $user = User::find($id);
        
        if ($stat == 'ACTIVE') {
            $user->acc_stat = 'INACTIVE';
        } else {
            $user->acc_stat = 'ACTIVE';
        }

        $user->save();

    }

    public function getMainUserLoad() {

        $query = User::select('id', 'username')
        ->with('accountType')
        ->with('accoutPoints')
        ->where('id', Auth::id())
        ->first();

        return $query;
    }

    public function getTransactionType($typ) {
        $query = RefTranstype::find($typ);

        return $query;
    }

    public function saveTrans(Request $request) {
        
        $request->validate([
            'transAmt' => ['required']
        ]);

        TblTransactions::create([
            'trans_type' => $request->transType,
            'trans_from' => $request->transFrom,
            'trans_to' => $request->transTo,
            'trans_amt' => $request->transAmt,
            'trans_remarks' => $request->transRemarks
        ]);
        
    }

    public function getTransactionLogs(Request $request) {

        $query = TblTransactions::with('getTransType')
                ->where('trans_to', $request->agentID)
                ->get();
 

        return $query;
    }
    
}
