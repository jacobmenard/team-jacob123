<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class AgentController extends Controller
{
    public function getAgentList() {
        $query = User::with('accountType')
        ->with('accoutPoints')
        ->where('acc_inv', 8)->get();

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
}
