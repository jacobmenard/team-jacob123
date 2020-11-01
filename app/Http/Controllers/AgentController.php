<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\RefTranstype;
use App\User;

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

    public function getTransactionType() {
        $query = RefTranstype::all();

        return $query;
    }
    
}
