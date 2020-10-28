<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class AgentController extends Controller
{
    public function getAgentList() {
        $query = User::all()
        ->select('id', 'username', 'email', 'acc_percentage', 'acc_load', 'ref_acc_type.acc_type', 'tbl_accounts.acc_stat')
        ->join('ref_acc_type', 'tbl_accounts.acc_type', '=', 'type_no')
        ->join('tbl_acc_points', 'id', '=', 'pt_acc')
        ->where('acc_inv', '=', Auth::id())
        ->get();

        return $query;
    }
}
