<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\RefTranstype;
use App\User;
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

    public function setAgentPercentage(Request $rq){
        $user = User::find($rq->id);
        $user->acc_percentage = $rq->percentage;
        
        if($user->save()){
            $response = array(
                'message' => 'Percentage successfuly set',
                'success' => true
            );
        }else{
            $response = array(
                'message' => 'Unable to set percentage',
                'success' => false
            );   
        }
        return $response;
                
    }

    public function getTransactionType() {
        $query = RefTranstype::all();
        return $query;
    }

    public function sendLoad(request $rq){

        $user = Auth::User();
        
        $user_points = TblAccPoints::where('pt_acc',$user->id)->get();
        $agent_points = TblAccPoints::where('pt_acc',$rq->userID)->get();
        
        $response = array(
            'message' => ' ',
            'success' => true,
        );
        
        switch($rq->sel_typ){
            //load
            case 1: if($rq->loadAmt > $user_points[0]->acc_load){
                        $response['message'] = 'Unable to proceed ammount is bigger than remaining load';
                        
                    }else{
                        $agent = TblAccPoints::where('pt_acc',$rq->userID)->first();
                        $agent->acc_load = $agent_points[0]->acc_load + $rq->loadAmt;
                        $user = TblAccPoints::where('pt_acc',$user->id)->first();
                        $user->acc_load = $user_points[0]->acc_load - $rq->loadAmt;

                        if($agent->save() && $user->save()){
    
                             $response['message'] = 'Successfully loaded!';
                             $response['success'] =  true;
                        }else{
                             $response['message'] = 'Unable to load!';
                             $response['success'] =  false;
                        }

                    }break;
            //agent redeem load
            case 2: if($rq->loadAmt > $agent_points[0]->acc_load){   
                        $response['message'] = 'Unable to proceed ammount is bigger than agent remaining load';
                    }else{
                        $agent = TblAccPoints::where('pt_acc',$rq->userID)->first();;
                        $agent->acc_load = $agent_points[0]->acc_load - $rq->loadAmt;
               
                        if($agent->save()){
                             $response['message'] = 'Successfully redeemed!';
                             $response['success'] =  true;
                        }else{
                             $response['message'] = 'Unable to redeem!';
                             $response['success'] =  false;
                        }

                    }break;

            default: break;
            
                
        }

        return $response;
    }
    
}
